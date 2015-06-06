<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Item;

/**
 * ItemSearch represents the model behind the search form about `app\models\Item`.
 */
class ItemSearch extends Item
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'price'], 'integer'],
            [['date', 'customer_id'], 'safe'],
            [['q'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Item::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        
        $query->joinWith('customer');    //Search GrisView

        $query->andFilterWhere([
            'id' => $this->id,
            //'customer_id' => $this->customer_id,
            'date' => $this->date,
            'q' => $this->q,
            'price' => $this->price,
        ]);
        
        $query->andFilterWhere(['like','customer.customer_name',$this->customer_id]);     //Search GrisView

        return $dataProvider;
    }
}

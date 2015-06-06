<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $date
 * @property double $q
 * @property integer $price
 *
 * @property Customer $customer
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'date', 'q', 'price'], 'required', 'message' => 'ว่างทำไม'],
            [['customer_id', 'price'], 'integer'],
            [['date'], 'safe'],
            [['q'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'ลูกค้า',
            'date' => 'วันที่ซื้อ',
            'q' => 'คิว',
            'price' => 'ราคา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }
}

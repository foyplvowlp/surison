<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการสั่งปูน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-index">

    <center>
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </center>

    <p>
        <?= Html::a('เพิ่มรายการ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
                'attribute' => 'customer_id',
                'value' => 'customer.customer_name', // customer คือ model
            ],
            'date',
            'q',
            'price',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>

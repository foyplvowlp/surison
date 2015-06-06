<?php

use yii\helpers\Html;
use yii\grid\GridView;
//use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการลูกค้า';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">
    <center>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>
    </center>

    <p>
        <?= Html::a('เพิ่มรายการลูกค้า', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <!--?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel' => [
            'before' => ''
        ]
    ]);
    ?-->

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'customer_name',
            'phone',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>

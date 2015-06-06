<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'รายการสั่งปูน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-view">

    <center>
        <h1>รายการสั่งปูนที่ <?= Html::encode($this->title) ?></h1>
    </center>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('ลบ', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณแน่ใจว่าต้องการลบรายการนี้',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'customer_id',
            [
                'attribute' => 'customer_id',
                'value' => $model->customer->customer_name,
            ],
            'date',
            'q',
            'price',
        ],
    ]);
    ?>

</div>

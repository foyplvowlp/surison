<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Item */

$this->title = 'แก้ไขรายการสั่งปูนที่ : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'รายการสั่งปูน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="item-update">

    <center>
    <h1><?= Html::encode($this->title) ?></h1>
    </center>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'แก้ไขรายการลูกค้าที่ : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'รายการลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="customer-update">

    <center>
        <h1><?= Html::encode($this->title) ?></h1>
    </center>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

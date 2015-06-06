<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'เพิ่มรายการลูกค้า';
$this->params['breadcrumbs'][] = ['label' => 'รายการลูกค้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="text-center">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

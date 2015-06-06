<?php

use yii\helpers\Html;
//use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Item */


$this->title = 'เพิ่มรายการสั่งปูน';
$this->params['breadcrumbs'][] = ['label' => 'รายการสั่งปูน', 'url' => ['index']];
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

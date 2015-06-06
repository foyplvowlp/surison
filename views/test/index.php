<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'ทดสอบสร้างฟอร์ม';
?>

<?php
if (Yii::$app->session->hasFlash('success')) {
    echo Yii::$app->session->getFlash('success');
}
?>

<center>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>ท่านที่ต้องการสมัครสมาชิกกับทางร้านเรากรุณากรอกข้อมูลด้วยนะค่ะ</p>
</center>

<?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

<div class="text-center">
    <div class="col-xs-12">
        <?= $form->field($model, 'test1') ?>

        <?= $form->field($model, 'test2') ?>

        <?= $form->field($model, 'test3') ?>
    </div>


    <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success', 'name' => 'test button']); ?>
</div>

<?php ActiveForm::end(); ?>
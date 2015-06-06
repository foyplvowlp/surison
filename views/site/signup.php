<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'ระบบสมัครสมาชิก';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <center>
        <h1><?= Html::encode($this->title) ?></h1>
        <p>ท่านที่ต้องการสมัครสมาชิกกับทางร้านเรากรุณากรอกข้อมูลด้วยนะค่ะ</p>
    </center>
    <?php //$form = ActiveForm::begin(['id' => 'form-signup']); ?>
    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>           <!--  ปรับฟอร์มเป็นแนวนอน   -->

    <div class="row">
        <?= $form->field($model, 'first_name') ?>
        <?= $form->field($model, 'last_name') ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <center>
            <div class="form-group">
                <?= Html::submitButton('สมัครสมาชิก', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
        </center>
        <?php ActiveForm::end(); ?>
    </div>
</div>



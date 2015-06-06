<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'เข้าสู่ระบบ';
$this->params['breadcrumbs'][] = $this->title;
?> 
<div class="text-center">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>เข้าสู่ระบบ กรุณาใส่ ชื่อผู้ใช้งาน และรหัสผ่าน</p>

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?=
    $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-2\">{input}</div>\n<div class=\"col-lg-10\">{error}</div>",
    ])->checkbox()
    ?>

    <div class="text-center">
        <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
    </div>


    <?php ActiveForm::end(); ?>
</div>

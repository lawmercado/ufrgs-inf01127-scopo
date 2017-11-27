<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="default-login">
    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="block-center">
    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput() ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "{input} {label} {error}",
        ]) ?>

        <?= Html::submitButton('Login', ['class' => 'botao', 'name' => 'login-button']) ?>

    </div>
    
    <?php ActiveForm::end(); ?>
</div>

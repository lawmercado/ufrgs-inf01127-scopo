<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Consumidor */
/* @var $pessoa app\modules\base\models\Pessoa */
/* @var $usuario app\modules\base\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consumidor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($pessoa, 'nome')->textInput() ?>

    <?= $form->field($model, 'cpf')->textInput([ 'maxlength' => true, "readonly" => !$model->isNewRecord]) ?>

    <?= $form->field($usuario, 'senha')->passwordInput([ "readonly" => !$model->isNewRecord]) ?>

    <?= $form->field($pessoa, 'email')->textInput() ?>

    <?= $form->field($pessoa, 'endereco')->textInput() ?>

    <?= $form->field($pessoa, 'cep')->textInput() ?>

    <?= $form->field($pessoa, 'cidade')->textInput() ?>

    <?= $form->field($pessoa, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', [ 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

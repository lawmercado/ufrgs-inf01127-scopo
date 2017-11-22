<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Consumidor */
/* @var $pessoa app\modules\base\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consumidor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($pessoa, 'nome')->textInput() ?>
    
    <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($pessoa, 'endereco')->textInput() ?>
    
    <?= $form->field($pessoa, 'cidade')->textInput() ?>
    
    <?= $form->field($pessoa, 'estado')->textInput() ?>
    
    <?= $form->field($pessoa, 'cep')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */
/* @var $pessoa app\modules\base\models\Pessoa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produtor-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($pessoa, 'nome')->textInput() ?>
    
    <?= $form->field($model, 'cnpj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($pessoa, 'email')->textInput() ?>
    
    <?= $form->field($pessoa, 'endereco')->textInput() ?>
    
    <?= $form->field($pessoa, 'cep')->textInput() ?>
    
    <?= $form->field($pessoa, 'cidade')->textInput() ?>
    
    <?= $form->field($pessoa, 'estado')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

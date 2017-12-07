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
    
    <div class="filtro-header">
        
        
        <div class="filtro-cnpj">
            <?= $form->field($model, 'cnpj')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="filtro-nome">    
            <?= $form->field($pessoa, 'nome')->textInput() ?>
        </div>
        <div class="filtro-email">
            <?= $form->field($pessoa, 'email')->textInput() ?>
        </div>
  
        
        <div class="filtro-endereco">
            <?= $form->field($pessoa, 'endereco')->textInput() ?>
        </div>
        <div class="filtro-cep">
            <?= $form->field($pessoa, 'cep')->textInput() ?>
        </div>
        <div class="filtro-cidade">
            <?= $form->field($pessoa, 'cidade')->textInput() ?>
        </div>
        <div class="filtro-estado">
            <?= $form->field($pessoa, 'estado')->textInput() ?>
        </div>
    </div>
    
    </br></br></br></br></br></br>

    <div class="form-group filtro-botao">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

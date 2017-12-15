<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\ConsumidorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consumidor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <div class="filtro-header">
        <div class="filtro-id"><?= $form->field($model, 'consumidor_id') ?></div>
        <div class="filtro-nome"><?= $form->field($model, 'Pessoa.nome') ?></div>
        <div class="filtro-cnpj"><?= $form->field($model, 'cpf') ?></div>
        <div class="filtro-cidade"><?= $form->field($model, 'Pessoa.cidade') ?></div>
        <div class="filtro-estado"><?= $form->field($model, 'Pessoa.estado') ?></div>
        <div class="filtro-email"><?= $form->field($model, 'Pessoa.email') ?></div>
        <div class="preenche"></br></br></br></br></br></br></div>
        
        
    </div>
    
    <div class="form-group filtro-botao">
        
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>
        
    

    <?php ActiveForm::end(); ?>
</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\MensagemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensagem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mensagem_id') ?>

    <?= $form->field($model, 'momento') ?>

    <?= $form->field($model, 'mensagem') ?>

    <?= $form->field($model, 'pedido_id') ?>

    <?= $form->field($model, 'pessoa_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

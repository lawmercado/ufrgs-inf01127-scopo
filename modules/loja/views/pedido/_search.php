<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\PedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pedido_id') ?>

    <?= $form->field($model, 'momento') ?>

    <?= $form->field($model, 'quantidade') ?>

    <?= $form->field($model, 'finalizado') ?>

    <?= $form->field($model, 'cancelado') ?>

    <?php // echo $form->field($model, 'oferta_id') ?>

    <?php // echo $form->field($model, 'consumidor_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

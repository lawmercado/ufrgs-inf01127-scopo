<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Oferta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oferta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'quantidade')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'preco')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'produto_id')->textInput() ?>

    <?= $form->field($model, 'produtor_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

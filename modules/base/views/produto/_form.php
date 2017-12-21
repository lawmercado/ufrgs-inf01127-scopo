<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\base\models\Categoria;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produto-form">



    <?php $form       = ActiveForm::begin(); ?>

    <div class="filtro-header">
        <div class="filtro-nome">
            <?= $form->field($model, 'nome')->textInput([ 'maxlength' => true]) ?>
        </div>
        <?php
        $categorias = ArrayHelper::map(Categoria::find()->all(), 'categoria_id', 'descricao');
        ?>
        <div class="filtro-categoria">
            <?= $form->field($model, 'categoria_id')->dropDownList($categorias); ?> 
        </div>
    </div>

    </br>



    <div class="form-group filtro-botao">
        <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', [ 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Pedido */

$this->title = 'Atualizar pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Pedido {$model->pedido_id}", 'url' => ['view', 'id' => $model->pedido_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="pedido-update">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php if( count($model->getErrors("status_id")) > 0 ): ?>
        <?= Html::error($model, "status_id", ["class" => "alert alert-danger"]) ?>
    <?php endif; ?>
    
    <p>
        <?php $form = ActiveForm::begin(); ?>
            <?= Html::submitButton("Aprovar", ['name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_EMANDAMENTO, 'class' => 'btn btn-success']) ?>
            <?= Html::submitButton("Cancelar", ['name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO, 'class' => 'btn btn-danger']) ?>
        <?php ActiveForm::end(); ?> 
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pedido_id',
            'momento',
            'quantidade',
            'oferta_id',
            'consumidor_id',
            'status_id'
        ],
    ]) ?>

</div>

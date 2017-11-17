<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Pedido */

$this->title = 'Update Pedido: ' . $model->pedido_id;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pedido_id, 'url' => ['view', 'id' => $model->pedido_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

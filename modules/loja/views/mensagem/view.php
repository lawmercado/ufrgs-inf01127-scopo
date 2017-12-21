<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Mensagem */

$this->title                   = "Mensagem {$model->mensagem_id}";
$this->params['breadcrumbs'][] = [ 'label' => 'Mensagens', 'url' => [ 'index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensagem-view">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', [ 'update', 'id' => $model->mensagem_id], [ 'class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Remover', [ 'delete', 'id' => $model->mensagem_id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'mensagem_id',
            'momento',
            'mensagem',
            'pedido_id',
            'pessoa_id',
        ],
    ])
    ?>

</div>

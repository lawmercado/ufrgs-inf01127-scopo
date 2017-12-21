<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use \app\modules\loja\models\Pedido;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Pedido */

$this->title                   = "Pedido #{$model->pedido_id}";
$this->params['breadcrumbs'][] = [ 'label' => 'Pedidos', 'url' => [ 'index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-view">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if( $model->status_id != Pedido::STATUS_CANCELADO && $model->status_id != Pedido::STATUS_FINALIZADO ): ?>
        <p>
            <?= Html::a('Atualizar', [ 'update', 'id' => $model->pedido_id], [ 'class' => 'btn btn-primary']) ?>

            <?php if( $model->status_id == Pedido::STATUS_EMANDAMENTO ): ?>
                <?= Html::a('Chat', [ 'mensagem/create', 'pedido_id' => $model->pedido_id], [ 'class' => 'btn btn-primary']); ?>
            <?php endif; ?>
        </p>
    <?php endif; ?>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            [
                'attribute' => 'momento',
                'value'     => Yii::$app->formatter->asDateTime($model->momento),
            ],
            [
                'label' => 'Status',
                'value' => function($model)
                {
                    switch( $model->status_id )
                    {
                        case Pedido::STATUS_PENDENTE: return 'Pendente';
                        case Pedido::STATUS_EMANDAMENTO: return 'Em andamento';
                        case Pedido::STATUS_FINALIZADO: return 'Finalizado';
                        case Pedido::STATUS_CANCELADO: return 'Cancelado';
                    }
                }
            ],
        ],
    ])
    ?>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            [
                "label" => "Produtor",
                "value" => $model->oferta->produtor->pessoa->nome
            ],
            [
                "label" => "Endereço de origem",
                "value" => function($model)
                {
                    return $model->oferta->produtor->pessoa->endereco . ', ' . $model->oferta->produtor->pessoa->cidade . ', ' . $model->oferta->produtor->pessoa->estado;
                }
            ],
        ],
    ])
    ?>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            [
                "label" => "Consumidor",
                "value" => $model->consumidor->pessoa->nome
            ],
            [
                "label" => "Endereço de destino",
                "value" => function($model)
                {
                    return $model->consumidor->pessoa->endereco . ', ' . $model->consumidor->pessoa->cidade . ', ' . $model->consumidor->pessoa->estado;
                }
            ],
        ],
    ])
    ?>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            [
                "label" => "Produto",
                "value" => function($model)
                {
                    return $model->quantidade . ' Kg x ' . $model->oferta->produto->nome;
                }
            ],
            [
                "label" => "Preço por Kg",
                "value" => "R$ " . Yii::$app->formatter->asDecimal($model->oferta->preco)
            ],
            [
                "label" => "Total",
                "value" => function($model)
                {
                    return "R$ " . Yii::$app->formatter->asDecimal($model->quantidade * $model->oferta->preco);
                }
            ],
        ],
    ])
    ?>



</div>

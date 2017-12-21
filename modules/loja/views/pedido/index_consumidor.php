<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\loja\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);   ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [
                'class'          => 'yii\grid\SerialColumn',
                'headerOptions'  => [ 'style' => 'width:5%; text-align: center'],
                'contentOptions' => [ 'style' => 'text-align: center'],
            ],
            [
                'attribute' => 'momento',
                'value'     => function($model)
                {
                    return Yii::$app->formatter->asDateTime($model->momento);
                },
                'headerOptions' => [ 'style' => 'width:18%;'],
            ],
            [
                'label'     => 'Produtor',
                'attribute' => 'oferta.produtor.pessoa.nome',
            ],
            [
                'attribute'     => 'consumidor.pessoa.cidade',
                'headerOptions' => [ 'style' => 'width:15%;'],
            ],
            [
                'label'         => 'Produto',
                'attribute'     => 'oferta.produto.nome',
                'headerOptions' => [ 'style' => 'width:10%;'],
            ],
            [
                'attribute'      => 'quantidade',
                'label'          => 'Qtd',
                'headerOptions'  => [ 'style' => 'width:3%; text-align: center'],
                'contentOptions' => [ 'style' => 'text-align: center'],
            ],
            [
                'label' => 'Status',
                'value' => function($model)
                {
                    switch( $model->status_id )
                    {
                        case 1: return 'Pendente';
                            break;
                        case 2: return 'Em andamento';
                            break;
                        case 3: return 'Finalizado';
                            break;
                        case 4: return 'Cancelado';
                            break;
                    }
                },
                'headerOptions'                => [ 'style' => 'width:1%; text-align: center'],
                'contentOptions'               => [ 'style' => 'text-align: center'],
            ],
            [
                'class'          => 'yii\grid\ActionColumn',
                'headerOptions'  => [ 'style' => 'width:10%; text-align: center'],
                'contentOptions' => [ 'style' => 'text-align: center'],
            ],
        ],
    ]);
    ?>
</div>
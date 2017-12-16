<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $dataProviderPendente yii\data\ActiveDataProvider */
/* @var $dataProviderEmAndamento yii\data\ActiveDataProvider */
/* @var $dataProviderFinalizado yii\data\ActiveDataProvider */
/* @var $dataProviderCancelado yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index_produtor">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', [tip'model' => $searchModel]); ?>
    
    <h2 class="status-pedido">Pendente</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderPendente,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width:5%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],
            ],

            [
                'label' => 'ID',
                'attribute' => 'pedido_id',
                'headerOptions' => ['style' => 'width:5%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'attribute' => 'momento',
                'value' => function($model){
                    return Yii::$app->formatter->asDateTime($model->momento);
                },
                'headerOptions' => ['style' => 'width:20%;'],             
            ],
            [
                'label' => 'Consumidor',
                'attribute' => 'consumidor.pessoa.nome',              
            ],
            [
                'attribute' => 'consumidor.pessoa.cidade',
                'headerOptions' => ['style' => 'width:15%;'],              
            ],
            [
                'label' => 'Produto',
                'attribute' => 'oferta.produto.nome',
                'headerOptions' => ['style' => 'width:10%;'],               
            ],
            [
                'attribute' => 'quantidade',
                'headerOptions' => ['style' => 'width:1%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:10%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
        ],
    ]); ?>
    
    <h2 class="status-pedido">Em andamento</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderEmAndamento,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width:5%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],
            ],

            [
                'label' => 'ID',
                'attribute' => 'pedido_id',
                'headerOptions' => ['style' => 'width:5%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'attribute' => 'momento',
                'value' => function($model){
                    return Yii::$app->formatter->asDateTime($model->momento);
                },
                'headerOptions' => ['style' => 'width:20%;'],             
            ],
            [
                'label' => 'Consumidor',
                'attribute' => 'consumidor.pessoa.nome',              
            ],
            [
                'attribute' => 'consumidor.pessoa.cidade',
                'headerOptions' => ['style' => 'width:15%;'],              
            ],
            [
                'label' => 'Produto',
                'attribute' => 'oferta.produto.nome',
                'headerOptions' => ['style' => 'width:10%;'],               
            ],
            [
                'attribute' => 'quantidade',
                'headerOptions' => ['style' => 'width:1%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:10%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
        ],
    ]); ?>
    
    <h2 class="status-pedido">Finalizados</h2>
    <?= GridView::widget([
        'dataProvider' => $dataProviderFinalizado,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width:5%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],
            ],

            [
                'label' => 'ID',
                'attribute' => 'pedido_id',
                'headerOptions' => ['style' => 'width:5%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'attribute' => 'momento',
                'value' => function($model){
                    return Yii::$app->formatter->asDateTime($model->momento);
                },
                'headerOptions' => ['style' => 'width:20%;'],             
            ],
            [
                'label' => 'Consumidor',
                'attribute' => 'consumidor.pessoa.nome',              
            ],
            [
                'attribute' => 'consumidor.pessoa.cidade',
                'headerOptions' => ['style' => 'width:15%;'],              
            ],
            [
                'label' => 'Produto',
                'attribute' => 'oferta.produto.nome',
                'headerOptions' => ['style' => 'width:10%;'],               
            ],
            [
                'attribute' => 'quantidade',
                'headerOptions' => ['style' => 'width:1%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:10%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
        ],
    ]); ?>
    
    <h2 class="status-pedido">Cancelados</h2>    
    <?= GridView::widget([
        'dataProvider' => $dataProviderCancelado,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width:5%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],
            ],

            [
                'label' => 'ID',
                'attribute' => 'pedido_id',
                'headerOptions' => ['style' => 'width:5%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'attribute' => 'momento',
                'value' => function($model){
                    return Yii::$app->formatter->asDateTime($model->momento);
                },
                'headerOptions' => ['style' => 'width:20%;'],             
            ],
            [
                'label' => 'Consumidor',
                'attribute' => 'consumidor.pessoa.nome',              
            ],
            [
                'attribute' => 'consumidor.pessoa.cidade',
                'headerOptions' => ['style' => 'width:15%;'],              
            ],
            [
                'label' => 'Produto',
                'attribute' => 'oferta.produto.nome',
                'headerOptions' => ['style' => 'width:10%;'],               
            ],
            [
                'attribute' => 'quantidade',
                'headerOptions' => ['style' => 'width:1%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:10%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
        ],
    ]); ?>
</div>
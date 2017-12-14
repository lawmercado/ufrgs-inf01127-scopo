<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\loja\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar pedido', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php echo $this->render('_search', array('model'=>$searchModel)); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width:5%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],
            ],

            [
                'attribute' => 'pedido_id',
                'headerOptions' => ['style' => 'width:5%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'attribute' => 'momento',
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
                'headerOptions' => ['style' => 'width:5%;'],               
            ],
            [
                'attribute' => 'quantidade',
                'headerOptions' => ['style' => 'width:1%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'label' => 'Status',
                'attribute' => 'statusPedido.descricao',
                'headerOptions' => ['style' => 'width:5%; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            
            // 'oferta_id',
            // 'consumidor_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:10%; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
        ],
    ]); ?>
</div>

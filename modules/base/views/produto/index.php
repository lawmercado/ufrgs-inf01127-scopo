<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\base\models\ProdutoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-index">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar produto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php echo $this->render('_search', array('model'=>$searchModel)); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width:50px; text-align: center' ],
                'contentOptions' => ['style' => 'text-align: center'],
            ],

            [
                'attribute' => 'produto_id',
                'headerOptions' => ['style' => 'width:50px; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],                
            ],
            [
                'attribute' => 'categoria.descricao',    
                'headerOptions' => ['style' => 'width:15%'],
            ],
            
            [
                'attribute' => 'nome',               
            ],
		
		
            
            
			

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:70px'],
            ],
        ],
    ]); ?>
</div>

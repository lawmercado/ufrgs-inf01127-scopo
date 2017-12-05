<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\base\models\ProdutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-index">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Criar produtor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'produtor_id',
                'headerOptions' => ['style' => 'width:5%'],
            ],
            [
                'label' => 'Nome',
                'attribute' => 'pessoa_id',
                'value' => 'relPessoa.nome',
                'headerOptions' => ['style' => 'width:30%'],
            ],
            [
                'attribute' => 'cnpj',
                'headerOptions' => ['style' => 'width:10%'],
            ],            
            [
                'attribute' => 'relPessoa.email',
                'headerOptions' => ['style' => 'width:30%'],                
            ],
            [
                'attribute' => 'relPessoa.cidade', 
                'headerOptions' => ['style' => 'width:10%'],                
            ],
            [
                'label' => 'UF',
                'attribute' => 'relPessoa.estado',
                'value' => 'relPessoa.estado',  
                'headerOptions' => ['style' => 'width:5%'],                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

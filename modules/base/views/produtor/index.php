<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;
use app\modules\base\models\Produtor;
use app\modules\base\models\Pessoa;
use yii\base\view;

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
                'attribute' => 'produtor_id',
                'headerOptions' => ['style' => 'width:50px; text-align: center'],
                'contentOptions' => ['style' => 'text-align: center'],
            ],
            [
                "label" => "Nome",
                "class" => yii\grid\DataColumn::className(),
                'filter' => ArrayHelper::map(Pessoa::find()->orderBy('nome')->asArray()->all(), 'pessoa_id', 'nome'),
                "value" => function($model){
                    if ($rel = $model->getRelPessoa()->one()) {
                        return $rel->nome;
                    } else {
                        return '';
                    }
                },
                "format" => "raw",
                'headerOptions' => ['style' => 'width:30%'], 
            ],
            [
                'attribute' => 'cnpj',
                'headerOptions' => ['style' => 'width:10%'],
            ],            
            [
                "label" => "E-mail",
                "class" => yii\grid\DataColumn::className(),
                'filter' => ArrayHelper::map(Pessoa::find()->orderBy('pessoa_id')->asArray()->all(), 'pessoa_id', 'email'),
                "value" => function($model){
                    if ($rel = $model->getRelPessoa()->one()) {
                        return $rel->email;
                    } else {
                        return '';
                    }
                },
                "format" => "raw",    
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
            
           
            

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'width:100px'],
            ],
        ],
    ]); ?>
</div>

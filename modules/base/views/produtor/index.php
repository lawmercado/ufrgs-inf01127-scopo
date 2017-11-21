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
        <?= Html::a('Criar produtor', ['create'], ['class' => 'btn btn-info']) ?>
    </p>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'produtor_id',
            'cnpj',
            'pessoa_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

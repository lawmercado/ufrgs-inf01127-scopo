<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\loja\models\ConsumidorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $pessoa app\modules\base\models\Pessoa */

$this->title = 'Consumidores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumidor-index">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);?>

    <p>
        <?= Html::a('Create Consumidor', ['create'], ['class' => 'botao btn btn-success']) ?>
    </p>
    
    
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'consumidor_id',
            'cpf',
            'pessoa_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

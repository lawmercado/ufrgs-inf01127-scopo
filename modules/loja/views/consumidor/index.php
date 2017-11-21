<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\loja\models\ConsumidorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consumidores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumidor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Consumidor', ['create'], ['class' => 'btn btn-success']) ?>
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

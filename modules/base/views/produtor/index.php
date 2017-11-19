<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\base\models\ProdutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Produtor', ['create'], ['class' => 'btn btn-info']) ?>
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

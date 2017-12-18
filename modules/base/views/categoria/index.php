<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\base\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="categoria-index">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Criar categoria', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?php echo $this->render('_search', array ( 'model' => $searchModel )); ?>

    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => [ 'style' => 'width:50px' ],
                'contentOptions' => [ 'style' => 'text-align: center' ],
            ],
            [
                'attribute' => 'categoria_id',
                'headerOptions' => [ 'style' => 'width:50px' ],
                'contentOptions' => [ 'style' => 'text-align: center' ],
            ],
            [
                'attribute' => 'descricao',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => [ 'style' => 'width:70px' ],
            ],
        ],
    ]);

    ?>
</div>

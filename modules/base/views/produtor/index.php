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

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Criar produtor', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>

    <?php echo $this->render('_search', array ( 'model' => $searchModel )); ?>

    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => [ 'style' => 'width:5%; text-align: center' ],
                'contentOptions' => [ 'style' => 'text-align: center' ],
            ],
            [
                'attribute' => 'produtor_id',
                'headerOptions' => [ 'style' => 'width:5%; text-align: center' ],
                'contentOptions' => [ 'style' => 'text-align: center' ],
            ],
            [
                "label" => "Nome",
                'attribute' => 'pessoa.nome',
            ],
            [
                'attribute' => 'cnpj',
                'headerOptions' => [ 'style' => 'width:15%' ],
            ],
            [
                "label" => "E-mail",
                'attribute' => 'pessoa.email',
                'headerOptions' => [ 'style' => 'width:25%' ],
            ],
            [
                'attribute' => 'pessoa.cidade',
                'headerOptions' => [ 'style' => 'width:15%' ],
            ],
            [
                'label' => 'UF',
                'attribute' => 'relPessoa.estado',
                'value' => 'relPessoa.estado',
                'headerOptions' => [ 'style' => 'width:5%' ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => [ 'style' => 'width:7%; text-align: center' ],
                'contentOptions' => [ 'style' => 'text-align: center' ],
            ],
        ],
    ]);

    ?>
</div>

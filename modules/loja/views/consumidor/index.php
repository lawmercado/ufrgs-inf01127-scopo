<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\loja\models\ConsumidorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $pessoa app\modules\base\models\Pessoa */

$this->title                   = 'Consumidores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumidor-index">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Criar consumidor', [ 'create'], [ 'class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', array('model' => $searchModel)); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            [
                'class'          => 'yii\grid\SerialColumn',
                'headerOptions'  => [ 'style' => 'width:5%; text-align: center'],
                'contentOptions' => [ 'style' => 'text-align: center'],
            ],
            [
                'attribute'      => 'consumidor_id',
                'headerOptions'  => [ 'style' => 'width:5%; text-align: center'],
                'contentOptions' => [ 'style' => 'text-align: center'],
            ],
            [
                "label"     => "Nome",
                'attribute' => 'pessoa.nome',
            ],
            [
                'attribute'     => 'cpf',
                'headerOptions' => [ 'style' => 'width:15%'],
            ],
            [
                "label"         => "E-mail",
                'attribute'     => 'pessoa.email',
                'headerOptions' => [ 'style' => 'width:25%'],
            ],
            [
                'attribute'     => 'pessoa.cidade',
                'headerOptions' => [ 'style' => 'width:15%'],
            ],
            [
                'label'         => 'UF',
                'attribute'     => 'pessoa.estado',
                'value'         => 'pessoa.estado',
                'headerOptions' => [ 'style' => 'width:5%'],
            ],
            [
                'class'          => 'yii\grid\ActionColumn',
                'headerOptions'  => [ 'style' => 'width:7%; text-align: center'],
                'contentOptions' => [ 'style' => 'text-align: center'],
            ],
        ],
    ]);
    ?>
</div>

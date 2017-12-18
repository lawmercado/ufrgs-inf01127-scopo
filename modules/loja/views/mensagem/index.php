<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\loja\models\MensagemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mensagens';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="mensagem-index">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a('Criar mensagem', [ 'create' ], [ 'class' => 'btn btn-success' ]) ?>
    </p>
    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [ 'class' => 'yii\grid\SerialColumn' ],
            'mensagem_id',
            'momento',
            'mensagem',
            'pedido_id',
            'pessoa_id',
            [ 'class' => 'yii\grid\ActionColumn' ],
        ],
    ]);

    ?>
</div>

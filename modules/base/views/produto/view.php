<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produto */

$this->title = "Produto {$model->produto_id}";
$this->params['breadcrumbs'][] = [ 'label' => 'Produtos', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="produto-view">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', [ 'update', 'id' => $model->produto_id ], [ 'class' => 'btn btn-primary' ]) ?>
        <?=

        Html::a('Remover', [ 'delete', 'id' => $model->produto_id ], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])

        ?>
    </p>

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'produto_id',
            'nome',
            'categoria.descricao',
        ],
    ])

    ?>

</div>

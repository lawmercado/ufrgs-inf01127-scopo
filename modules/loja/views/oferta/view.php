<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Oferta */

$this->title = "Oferta #{$model->oferta_id}";
$this->params['breadcrumbs'][] = [ 'label' => 'Ofertas', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="oferta-view">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'oferta_id',
            'momento',
            [
                'label' => 'Produtor',
                'attribute' => 'produtor.pessoa.nome'
            ],
            [
                'label' => 'Produto',
                'attribute' => 'produto.nome'
            ],
            [
                'label' => 'Quantidade',
                "attribute" => "quantidade",
                "value" => function($model)
                {
                    return $model->quantidade . ' Kg';
                }
            ],
            [
                "attribute" => "preco",
                "value" => function($model)
                {
                    return 'R$ ' . $model->preco;
                }
            ],
        ],
    ])

    ?>

</div>

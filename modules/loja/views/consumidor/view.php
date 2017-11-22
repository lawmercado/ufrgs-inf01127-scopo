<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Consumidor */

$this->title = "Produtor {$model->consumidor_id}";
$this->params['breadcrumbs'][] = ['label' => 'Consumidor', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumidor-view">

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->consumidor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->consumidor_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'consumidor_id',
            [
                "label" => "Nome",
                "value" => $model->pessoa->nome
            ],
            'cpf',
            [
                "label" => "Endereço",
                "value" => $model->pessoa->endereco
            ],
            [
                "label" => "Cidade",
                "value" => $model->pessoa->cidade
            ],
            [
                "label" => "Estado",
                "value" => $model->pessoa->estado
            ],
            [
                "label" => "CEP",
                "value" => $model->pessoa->cep
            ],
        ],
    ]) ?>

</div>

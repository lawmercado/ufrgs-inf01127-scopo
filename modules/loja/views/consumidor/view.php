<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Consumidor */

$this->title                   = "Perfil";
$this->params['breadcrumbs'][] = [ 'label' => 'Consumidores', 'url' => [ 'index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumidor-view">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', [ 'update', 'id' => $model->consumidor_id], [ 'class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Remover', [ 'delete', 'id' => $model->consumidor_id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Tem certeza que deseja remover esse item?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
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
    ])
    ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */
/* @var $senha string */


$this->title                   = "Produtor {$model->produtor_id}";
$this->params['breadcrumbs'][] = [ 'label' => 'Produtores', 'url' => [ 'index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-view">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', [ 'update', 'id' => $model->produtor_id], [ 'class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Remover', [ 'delete', 'id' => $model->produtor_id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method'  => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'produtor_id',
            [
                "label" => "Nome",
                "value" => $model->pessoa->nome
            ],
            'cnpj',
            [
                "label" => "Senha",
                "value" => $senha
            ],
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

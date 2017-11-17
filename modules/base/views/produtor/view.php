<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */

$this->title = $model->produtor_id;
$this->params['breadcrumbs'][] = ['label' => 'Produtors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->produtor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->produtor_id], [
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
            'produtor_id',
            'cnpj',
            'pessoa_id',
        ],
    ]) ?>

</div>

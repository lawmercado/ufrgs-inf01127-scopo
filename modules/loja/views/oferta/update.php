<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Oferta */

$this->title = 'Update Oferta: ' . $model->oferta_id;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->oferta_id, 'url' => ['view', 'id' => $model->oferta_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="oferta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

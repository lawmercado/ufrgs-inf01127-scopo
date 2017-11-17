<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Consumidor */

$this->title = 'Update Consumidor: ' . $model->consumidor_id;
$this->params['breadcrumbs'][] = ['label' => 'Consumidors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->consumidor_id, 'url' => ['view', 'id' => $model->consumidor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consumidor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

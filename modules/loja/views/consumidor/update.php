<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Consumidor */

$this->title = 'Atualizar consumidor';
$this->params['breadcrumbs'][] = ['label' => 'Consumidores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Consumidor {$model->consumidor_id}", 'url' => ['view', 'id' => $model->consumidor_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="consumidor-update">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

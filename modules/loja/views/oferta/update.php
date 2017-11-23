<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Oferta */

$this->title = 'Atualizar oferta';
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Oferta {$model->oferta_id}", 'url' => ['view', 'id' => $model->oferta_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="oferta-update">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

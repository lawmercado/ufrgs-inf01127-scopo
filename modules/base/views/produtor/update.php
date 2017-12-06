<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */

$this->title = 'Atualizar produtor';
$this->params['breadcrumbs'][] = ['label' => 'Produtores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Produtor {$model->produtor_id}", 'url' => ['view', 'id' => $model->produtor_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="produtor-update">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pessoa' => $model->pessoa,
        'usuario' => $model->usuario
    ]) ?>

</div>

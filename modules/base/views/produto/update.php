<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produto */

$this->title = 'Atualizar produto';
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Produto {$model->produto_id}", 'url' => ['view', 'id' => $model->produto_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="produto-update">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categoria' => $model->categoria
    ]) ?>

</div>

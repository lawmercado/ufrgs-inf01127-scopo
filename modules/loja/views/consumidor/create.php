<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Consumidor */
/* @var $pessoa app\modules\base\models\Pessoa */

$this->title = 'Cadastrar Consumidor';
$this->params['breadcrumbs'][] = ['label' => 'Consumidores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumidor-create">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pessoa' => $pessoa
    ]) ?>

</div>

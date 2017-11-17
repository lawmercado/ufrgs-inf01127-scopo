<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Mensagem */

$this->title = 'Update Mensagem: ' . $model->mensagem_id;
$this->params['breadcrumbs'][] = ['label' => 'Mensagems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mensagem_id, 'url' => ['view', 'id' => $model->mensagem_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mensagem-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

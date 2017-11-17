<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */

$this->title = 'Update Produtor: ' . $model->produtor_id;
$this->params['breadcrumbs'][] = ['label' => 'Produtors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->produtor_id, 'url' => ['view', 'id' => $model->produtor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="produtor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

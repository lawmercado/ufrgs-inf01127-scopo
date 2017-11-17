<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */

$this->title = 'Create Produtor';
$this->params['breadcrumbs'][] = ['label' => 'Produtors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produto */

$this->title                   = 'Criar produto';
$this->params['breadcrumbs'][] = [ 'label' => 'Produtos', 'url' => [ 'index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produto-create">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

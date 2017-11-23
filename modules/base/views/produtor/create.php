<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\Produtor */
/* @var $pessoa app\modules\base\models\Pessoa */

$this->title = 'Criar produtor';
$this->params['breadcrumbs'][] = ['label' => 'Produtores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtor-create">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1 class="titulo"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pessoa' => $pessoa
    ]) ?>

</div>

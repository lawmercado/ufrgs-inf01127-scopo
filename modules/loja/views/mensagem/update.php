<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Mensagem */

$this->title = 'Atualizar mensagem';
$this->params['breadcrumbs'][] = [ 'label' => 'Mensagens', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => "Mensagem {$model->mensagem_id}", 'url' => [ 'view', 'id' => $model->mensagem_id ] ];
$this->params['breadcrumbs'][] = 'Atualizar';

?>
<div class="mensagem-update">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?=

    $this->render('_form', [
        'model' => $model,
    ])

    ?>

</div>

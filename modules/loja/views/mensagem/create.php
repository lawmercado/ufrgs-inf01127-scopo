<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Mensagem */
/* @var $pessoa app\modules\base\models\Pessoa */
/* @var $pedido app\modules\loja\models\Pedido */
/* @var $mensagem app\modules\loja\models\Mensagem */

$this->title = 'Mensagens';
$this->params['breadcrumbs'][] = ['label' => 'Mensagens', 'url' => ['pedido/index', "id" => $pedido->pedido_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensagem-create">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
    
    <div id="chat" class="messages-chat">
        <?php foreach ($mensagens as $mensagem): ?>
        <p class="message <?= $pessoa->pessoa_id == $mensagem->pessoa_id ? "viewer-message" : "other-message" ?>"><?= $mensagem->mensagem ?></p>
        <p class="message-momento <?= $pessoa->pessoa_id == $mensagem->pessoa_id ? "viewer-message" : "other-message" ?>">às <?= Yii::$app->formatter->asDatetime($mensagem->momento) ?></p>
        <?php endforeach; ?>
    </div>
    
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'mensagem')->textarea(['maxlength' => true, "placeholder" => "Digite uma mensagem"])->label(false) ?>

        <?= $form->field($model, 'pedido_id')->hiddenInput(['value' => $pedido->pedido_id])->label(false); ?>

        <?= $form->field($model, 'pessoa_id')->hiddenInput(['value' => $pessoa->pessoa_id])->label(false); ?>

        <div class="form-group">
            <?= Html::submitButton("Enviar", ['class' => 'botao']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    
    <script>
        var element = document.getElementById("chat");
        element.scrollTop = element.scrollHeight;
    </script>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Pedido */
/* @var $oferta app\modules\loja\models\Oferta */
/* @var $consumidor app\modules\loja\models\Consumidor */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Confirmação do pedido';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-create">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1 class="titulo">Resumo do pedido</h1>
    
    <?= DetailView::widget([
        'model' => $oferta,
        'attributes' => [
            [
                "label" => "Preço por Kg",
                "value" => "R$" . Yii::$app->formatter->asDecimal($oferta->preco)
            ],
            'quantidade',
            [
                "label" => "Produto",
                "value" => $oferta->produto->nome
            ]
        ],
    ]) ?>
    
     <?php $form = ActiveForm::begin(); ?>
        
        <?= $form->field($model, 'quantidade')->textInput(['type' => 'number']); ?>
    
        <?= $form->field($model, 'consumidor_id')->hiddenInput(['value' => $consumidor->consumidor_id])->label(false); ?>

        <?= $form->field($model, 'oferta_id')->hiddenInput(['value' => $oferta->oferta_id])->label(false); ?>
    
        <div class="termo">
            <p>Tanto a entrega quanto o pagamento são tratados diretamente com o Produtor.</p>
            <p>O SCOPO não se responsabiliza pelos acordos Consumidor/Produtor.</p>
            <p><strong>Ao clicar no botão abaixo, você concorda com os termos acima.</strong></p>
        </div>
    
        <?= Html::submitButton("Confirmar", ['class' => "botao"]) ?>
    
    <?php ActiveForm::end(); ?>

</div>

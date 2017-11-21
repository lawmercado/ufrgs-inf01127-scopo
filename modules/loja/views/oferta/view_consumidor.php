<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Oferta */

$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];

?>
<div class="oferta-view">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1 class="titulo">Resumo do pedido</h1>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                "label" => "Preço por Kg",
                "value" => "R$" . Yii::$app->formatter->asDecimal($model->preco)
            ],
            'quantidade',
            [
                "label" => "Produto",
                "value" => $model->produto->nome
            ]
        ],
    ]) ?>
    
    <div class="termo">
        <p>A quantidade solicitada pode ser alterada diretamente com o Produtor.</p>
        <p>Tanto a entrega quanto o pagamento são tratados diretamente com o Produtor.</p>
        <p>O SCOPO não se responsabiliza pelos acordos Consumidor/Produtor.</p>
        <p><strong>Ao clicar no botão abaixo, você concorda com os termos acima.</strong></p>
    </div>
        
    <?= Html::a("Confirmar", "", ["class" => "botao"])?>

</div>

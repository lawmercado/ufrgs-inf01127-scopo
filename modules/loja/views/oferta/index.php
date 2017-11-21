<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\VarDumper;

/* @var $this yii\web\View */
/* @var $ofertas array */

$this->title = 'Ofertas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oferta-index">
    <div class="search-area">
        <?php $form = ActiveForm::begin(); ?>

        <?= Html::textInput("pesquisa", "", ["placeholder" => "Insira o termo de busca"]) ?><?= Html::submitButton("Pesquisar", ["class" => "botao-inline"]) ?>
        
        <?php ActiveForm::end(); ?>
    </div>    
    <div class="ofertas">
    <?php foreach($ofertas as $oferta): ?>
        <div class="oferta">
            <div><img /></div>
            <p class="oferta-produto"><?= $oferta->produto->categoria->descricao?>::<?= $oferta->produto->nome ?></p>
            <p class="oferta-quantidade"><?= $oferta->quantidade ?>Kg</p>
            <p class="oferta-preco">R$<?= Yii::$app->formatter->asDecimal($oferta->preco) ?> por Kg</p>
            <p class="oferta-local"><?= $oferta->produtor->pessoa->cidade ?>, <?= $oferta->produtor->pessoa->estado ?></p>
            <?= Html::a("Solicitar", Url::toRoute(["view", "id" => $oferta->oferta_id]), ["class" => "botao"]) ?>
        </div>
    <?php endforeach; ?>
    
</div>

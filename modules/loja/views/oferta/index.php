<?php

use yii\helpers\Html;
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

        <?= Html::input("text", "pesquisa") ?><?= Html::submitButton("Pesquisar") ?>
        
        <?php ActiveForm::end(); ?>
    </div>    
    <div class="ofertas">
    <?php foreach($ofertas as $oferta): ?>
        <div class="oferta">
            <div><img /></div>
            <p class="oferta-quantidade"><?= $oferta->quantidade ?>Kg</p>
            <p class="oferta-preco">R$<?= Yii::$app->formatter->asDecimal($oferta->preco) ?> por Kg</p>
            <p class="oferta-local"><?= $oferta->produtor->pessoa->cidade ?>, <?= $oferta->produtor->pessoa->estado ?></p>
        </div>
    <?php endforeach; ?>
    
</div>

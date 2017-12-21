<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>O erro acima foi causado enquanto o servidor processava a sua requisição.</p>
    <p>Se caso a página requisitada deve existir, por favor, contate-nos. Obrigado.</p>

</div>

<?php

use yii\helpers\Html;

?>

<div class="base-default-index">
    <h1>Olá. Para onde você quer ir?</h1>

    <p><?= Html::a("Categorias", [ "categoria/index" ], [ "class" => "botao" ]) ?></p>
    <p><?= Html::a("Produtos", [ "produto/index" ], [ "class" => "botao" ]) ?><p>
    <p><?= Html::a("Produtores", [ "produtor/index" ], [ "class" => "botao" ]) ?></p>
</div>
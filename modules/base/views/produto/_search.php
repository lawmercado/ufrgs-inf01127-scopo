<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\base\models\ProdutoSearch */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="produto-search">

    <?php

    $form = ActiveForm::begin([
        'action' => [ 'index' ],
        'method' => 'get',
    ]);

    ?>

    <div class="filtro-header">
        <div class="filtro-id"><?= $form->field($model, 'produto_id') ?></div>
        <div class="filtro-categoria"><?= $form->field($model, 'Categoria.descricao') ?></div>
        <div class="filtro-nome"><?= $form->field($model, 'nome') ?></div>
    </div>

    <div class="form-group filtro-botao">
        <?= Html::submitButton('Buscar', [ 'class' => 'btn btn-primary' ]) ?>
        <?= Html::a('Limpar', [ 'index' ], [ 'class' => 'btn btn-default' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

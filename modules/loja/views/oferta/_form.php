<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\base\models\Produtor;
use app\modules\base\models\Pessoa;
use app\modules\base\models\Usuario;
use app\modules\base\models\Produto;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Oferta */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="oferta-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="campo-oferta">
        
        
        <div class="campo-oferta-input">
            <?= $form->field($upload, 'imageFile')->fileInput()->label("Imagem") ?>            
        </div>
        
        
        
        <div class="campo-oferta-quantidade">
            <?= $form->field($model, 'quantidade')->textInput([ 'type' => 'number' ]) ?>
        </div>   


        <div class="campo-oferta-preco">
            <?= $form->field($model, 'preco')->textInput([ 'type' => 'number' ]) ?>
        </div>    

        <?php

        $produtos = ArrayHelper::map(Produto::find()->all(), 'produto_id', 'nome');

        ?>
        <div class="campo-oferta-produto">
            <?= $form->field($model, 'produto_id')->dropDownList($produtos); ?> 
        </div>

        <?php

        $id = Produtor::findOne([ "pessoa_id" => Yii::$app->user->identity->pessoa_id ]);
        $model->produtor_id = $id->produtor_id;

        ?>

        <div class="campo-oferta-produtor">
            <?= $form->field($model, 'produtor_id')->hiddenInput([ 'value' => $id->produtor_id ])->label(false); ?> 

        </div>        

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', [ 'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'style' => 'display: block; margin: auto; width: 30%;' ]) ?>
        </div>
    </div>    
    <?php ActiveForm::end(); ?>

</div>

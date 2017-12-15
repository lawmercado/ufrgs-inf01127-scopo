<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use app\modules\base\models\Usuario;
use app\modules\loja\models\Pedido;

/* @var $this yii\web\View */
/* @var $model app\modules\loja\models\Pedido */

$this->title = 'Atualizar pedido';
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Pedido {$model->pedido_id}", 'url' => ['view', 'id' => $model->pedido_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="pedido-update">

    <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
    
    <h1><?= Html::encode($this->title) ?></h1>
    
    <?php if( count($model->getErrors("status_id")) > 0 ): ?>
        <?= Html::error($model, "status_id", ["class" => "alert alert-danger"]) ?>
    <?php endif; ?>
    
    <p>
        <?php $form = ActiveForm::begin();
            $pessoa_id = Yii::$app->user->identity->pessoa_id;
            $papel_id = Yii::$app->user->identity->papel_id;
            $status_id = $model->status_id;
        
        switch($papel_id) {
            case Usuario::PAPEL_PRODUTOR:
                if( $status_id == Pedido::STATUS_PENDENTE ) {
                    echo Html::submitButton("Aprovar", ['name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_EMANDAMENTO, 'class' => 'btn btn-success']);
                    echo Html::submitButton("Cancelar", ['name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO, 'class' => 'btn btn-danger']);
                            
                } elseif ( $status_id == Pedido::STATUS_EMANDAMENTO ) {
                    echo Html::a('Chat', ['app/modules/loja/views/mensagem/create'], ['class'=>'btn btn-primary']); 
                    echo Html::submitButton("Finalizar", ['name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_FINALIZADO, 'class' => 'btn btn-success']);
                    echo Html::submitButton("Cancelar", ['name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO, 'class' => 'btn btn-danger']);     
                }
                
                break;
                
            case Usuario::PAPEL_CONSUMIDOR:
                if ( $status_id == Pedido::STATUS_EMANDAMENTO ) {
                    echo Html::a('Chat', ['app/modules/loja/views/mensagem/create'], ['class'=>'btn btn-primary']); 
                } else {
                    echo Html::submitButton("Cancelar", ['name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO, 'class' => 'btn btn-danger']);
                }
                
                break;
        }?>
        <?php ActiveForm::end(); ?> 
    </p>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pedido_id',
            'momento',
            'quantidade',
            'oferta_id',
            'consumidor_id',
            'status_id'
        ],
    ]) ?>

</div>

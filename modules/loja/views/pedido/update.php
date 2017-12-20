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
$this->params['breadcrumbs'][] = [ 'label' => 'Pedidos', 'url' => [ 'index' ] ];
$this->params['breadcrumbs'][] = [ 'label' => "Pedido #{$model->pedido_id}", 'url' => [ 'view', 'id' => $model->pedido_id ] ];
$this->params['breadcrumbs'][] = 'Atualizar';

?>
<div class="pedido-update">

    <?= Breadcrumbs::widget([ 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ( count($model->getErrors("status_id")) > 0 ): ?>
        <?= Html::error($model, "status_id", [ "class" => "alert alert-danger" ]) ?>
    <?php endif; ?>

    <p>
        <?php

        $form = ActiveForm::begin();
        $pessoa_id = Yii::$app->user->identity->pessoa_id;
        $papel_id = Yii::$app->user->identity->papel_id;
        $status_id = $model->status_id;

        switch ( $papel_id )
        {
            case Usuario::PAPEL_PRODUTOR:
                if ( $status_id == Pedido::STATUS_PENDENTE )
                {
                    echo Html::submitButton("Aprovar", [ 'name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_EMANDAMENTO, 'class' => 'btn btn-success' ]);
                    echo Html::submitButton("Cancelar", [
                        'name' => 'status_id',
                        'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO,
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Você tem certeza que quer cancelar esse pedido?',
                        ],
                    ]);
                }
                elseif ( $status_id == Pedido::STATUS_EMANDAMENTO )
                {
                    echo Html::a('Chat', [ 'mensagem/create', 'pedido_id' => $model->pedido_id ], [ 'class' => 'btn btn-primary' ]);
                    echo Html::submitButton("Finalizar", [ 'name' => 'status_id', 'value' => app\modules\loja\models\Pedido::STATUS_FINALIZADO, 'class' => 'btn btn-success' ]);
                    echo Html::submitButton("Cancelar", [
                        'name' => 'status_id',
                        'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO,
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Você tem certeza que quer cancelar esse pedido?',
                        ]
                    ]);
                }

                break;

            case Usuario::PAPEL_CONSUMIDOR:
                if ( $status_id == Pedido::STATUS_EMANDAMENTO )
                {
                    echo Html::a('Chat', [ 'mensagem/create', 'pedido_id' => $model->pedido_id ], [ 'class' => 'btn btn-primary' ]);
                    echo Html::submitButton("Cancelar", [
                        'name' => 'status_id',
                        'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO,
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Você tem certeza que quer cancelar esse pedido?',
                        ]
                    ]);
                }
                else if ( $status_id == Pedido::STATUS_PENDENTE )
                {
                    echo Html::submitButton("Cancelar", [
                        'name' => 'status_id',
                        'value' => app\modules\loja\models\Pedido::STATUS_CANCELADO,
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Você tem certeza que quer cancelar esse pedido?',
                        ]
                    ]);
                }

                break;
        }

        ?>
        <?php ActiveForm::end(); ?> 
    </p>

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'momento',
                'value' => Yii::$app->formatter->asDateTime($model->momento),
            ],
            [
                'label' => 'Status',
                'value' => function($model)
                {
                    switch ( $model->status_id )
                    {
                        case 1: return 'Pendente';
                            break;
                        case 2: return 'Em andamento';
                            break;
                        case 3: return 'Finalizado';
                            break;
                        case 4: return 'Cancelado';
                            break;
                    }
                }
            ],
        ],
    ])

    ?>

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                "label" => "Produtor",
                "value" => $model->oferta->produtor->pessoa->nome
            ],
            [
                "label" => "Endereço de origem",
                "value" => function($model)
                {
                    return $model->oferta->produtor->pessoa->endereco . ', ' . $model->oferta->produtor->pessoa->cidade . ', ' . $model->oferta->produtor->pessoa->estado;
                }
            ],
        ],
    ])

    ?>

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                "label" => "Consumidor",
                "value" => $model->consumidor->pessoa->nome
            ],
            [
                "label" => "Endereço de destino",
                "value" => function($model)
                {
                    return $model->consumidor->pessoa->endereco . ', ' . $model->consumidor->pessoa->cidade . ', ' . $model->consumidor->pessoa->estado;
                }
            ],
        ],
    ])

    ?>

    <?=

    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                "label" => "Produto",
                "value" => function($model)
                {
                    return $model->quantidade . ' Kg x ' . $model->oferta->produto->nome;
                }
            ],
            [
                "label" => "Preço por Kg",
                "value" => "R$ " . Yii::$app->formatter->asDecimal($model->oferta->preco)
            ],
            [
                "label" => "Total",
                "value" => function($model)
                {
                    return "R$ " . Yii::$app->formatter->asDecimal($model->quantidade * $model->oferta->preco);
                }
            ],
        ],
    ])

    ?>

</div>

<?php

namespace app\modules\loja\models;

use Yii;

/**
 * This is the model class for table "StatusPedido".
 *
 * @property integer $status_id
 * @property string $descricao
 *
 * @property Pedido[] $pedidos
 */
class StatusPedido extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'StatusPedido';

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'descricao' ], 'required' ],
            [ [ 'descricao' ], 'string', 'max' => 20 ],
        ];

    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Identificador',
            'descricao' => 'Descrição',
        ];

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), [ 'status_id' => 'status_id' ]);

    }

}

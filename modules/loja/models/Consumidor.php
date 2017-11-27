<?php

namespace app\modules\loja\models;

use Yii;
use app\modules\base\models\Pessoa;

/**
 * This is the model class for table "Consumidor".
 *
 * @property integer $consumidor_id
 * @property string $cpf
 * @property integer $pessoa_id
 *
 * @property Pessoa $pessoa
 * @property Pedido[] $pedidos
 */
class Consumidor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Consumidor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cpf', 'pessoa_id'], 'required'],
            [['pessoa_id'], 'integer'],
            [['cpf'], 'integer'],
            [['cpf'], 'string', 'max' => 11, 'min' => 11],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'consumidor_id' => 'Identificador',
            'cpf' => 'CPF',
            'pessoa_id' => 'Pessoa associada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(Pessoa::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['consumidor_id' => 'consumidor_id']);
    }
}

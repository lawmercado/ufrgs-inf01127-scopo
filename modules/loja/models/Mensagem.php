<?php

namespace app\modules\loja\models;

use Yii;
use app\modules\base\models\Pessoa;

/**
 * This is the model class for table "Mensagem".
 *
 * @property integer $mensagem_id
 * @property string $momento
 * @property string $mensagem
 * @property integer $pedido_id
 * @property integer $pessoa_id
 *
 * @property Pedido $pedido
 * @property Pessoa $pessoa
 */
class Mensagem extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Mensagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'momento'], 'safe'],
            [ [ 'mensagem', 'pedido_id', 'pessoa_id'], 'required'],
            [ [ 'pedido_id', 'pessoa_id'], 'integer'],
            [ [ 'mensagem'], 'string', 'max' => 280],
            [ [ 'pedido_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => [ 'pedido_id' => 'pedido_id']],
            [ [ 'pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => [ 'pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mensagem_id' => 'Identificador',
            'momento'     => 'Momento da criação',
            'mensagem'    => 'Mensagem',
            'pedido_id'   => 'Pedido associado',
            'pessoa_id'   => 'Pessoa associada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), [ 'pedido_id' => 'pedido_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(Pessoa::className(), [ 'pessoa_id' => 'pessoa_id']);
    }

}

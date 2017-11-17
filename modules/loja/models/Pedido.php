<?php

namespace app\modules\loja\models;

use Yii;

use app\modules\base\models\Pessoa;

/**
 * This is the model class for table "Pedido".
 *
 * @property integer $pedido_id
 * @property string $momento
 * @property integer $quantidade
 * @property integer $finalizado
 * @property integer $cancelado
 * @property integer $oferta_id
 * @property integer $consumidor_id
 *
 * @property Mensagem[] $mensagens
 * @property Oferta $oferta
 * @property Consumidor $consumidor
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['momento'], 'safe'],
            [['quantidade', 'oferta_id', 'consumidor_id'], 'required'],
            [['quantidade', 'finalizado', 'cancelado', 'oferta_id', 'consumidor_id'], 'integer'],
            [['oferta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oferta::className(), 'targetAttribute' => ['oferta_id' => 'oferta_id']],
            [['consumidor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consumidor::className(), 'targetAttribute' => ['consumidor_id' => 'consumidor_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pedido_id' => 'Identificador',
            'momento' => 'Momento da criação',
            'quantidade' => 'Quantidade',
            'finalizado' => 'Finalizado',
            'cancelado' => 'Cancelado',
            'oferta_id' => 'Oferta associada',
            'consumidor_id' => 'Consumidor associado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensagens()
    {
        return $this->hasMany(Mensagem::className(), ['pedido_id' => 'pedido_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOferta()
    {
        return $this->hasOne(Oferta::className(), ['oferta_id' => 'oferta_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumidor()
    {
        return $this->hasOne(Consumidor::className(), ['consumidor_id' => 'consumidor_id']);
    }
}

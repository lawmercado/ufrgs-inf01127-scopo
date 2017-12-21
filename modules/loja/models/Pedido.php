<?php

namespace app\modules\loja\models;

use Yii;

/**
 * This is the model class for table "Pedido".
 *
 * @property integer $pedido_id
 * @property string $momento
 * @property integer $quantidade
 * @property integer $status_id
 * @property integer $oferta_id
 * @property integer $consumidor_id
 *
 * @property Mensagem[] $mensagens
 * @property Oferta $oferta
 * @property Consumidor $consumidor
 * @property StatusPedido $status
 */
class Pedido extends \yii\db\ActiveRecord
{

    const STATUS_PENDENTE    = 1;
    const STATUS_EMANDAMENTO = 2;
    const STATUS_FINALIZADO  = 3;
    const STATUS_CANCELADO   = 4;

    public function __construct($config = array())
    {
        parent::__construct($config);

        $this->status_id = Pedido::STATUS_PENDENTE;
    }

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
            [ [ 'momento'], 'safe'],
            [ [ 'quantidade', 'oferta_id', 'consumidor_id'], 'required'],
            [ [ 'quantidade', 'status_id', 'oferta_id', 'consumidor_id'], 'integer'],
            [ [ 'oferta_id'], 'exist', 'skipOnError' => true, 'targetClass' => Oferta::className(), 'targetAttribute' => [ 'oferta_id' => 'oferta_id']],
            [ [ 'status_id'], 'exist', 'skipOnError' => true, 'targetClass' => StatusPedido::className(), 'targetAttribute' => [ 'status_id' => 'status_id']],
            [ [ 'consumidor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Consumidor::className(), 'targetAttribute' => [ 'consumidor_id' => 'consumidor_id']],
            [ 'quantidade', 'validateQuantidade'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pedido_id'     => 'Identificador',
            'momento'       => 'Momento da criação',
            'quantidade'    => 'Quantidade',
            'status_id'     => 'Status',
            'oferta_id'     => 'Oferta associada',
            'consumidor_id' => 'Consumidor associado',
        ];
    }

    /**
     * Valida a quantidade
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateQuantidade($attribute, $params)
    {
        if( !$this->hasErrors() )
        {
            $oferta = Oferta::findOne([ "oferta_id" => $this->oferta_id]);

            if( $this->quantidade > $oferta->quantidade )
            {
                $this->addError($attribute, 'Quantidade informada é maior que oferecida!');

                return false;
            }
        }

        return true;
    }

    public function alterarStatus($status_id)
    {
        if( $this->isNewRecord )
        {
            return false;
        }

        $transaction = Yii::$app->db->beginTransaction();

        try
        {
            switch( $status_id )
            {
                case Pedido::STATUS_EMANDAMENTO:
                    $oferta_id = $this->oferta->alterarQuantidade($this->quantidade, true);

                    $this->atualizarPedidosRelacionados($oferta_id);

                    $this->status_id = $status_id;
                    $this->oferta_id = $oferta_id;

                    $this->save(false);

                    break;

                case Pedido::STATUS_FINALIZADO:
                    $this->status_id = $status_id;

                    $this->save(false);

                    break;

                case Pedido::STATUS_CANCELADO:
                    if( $this->status_id == Pedido::STATUS_EMANDAMENTO )
                    {
                        $oferta_id = $this->oferta->alterarQuantidade($this->quantidade, false);

                        $this->atualizarPedidosRelacionados($oferta_id);
                    }

                    $this->status_id = $status_id;

                    $this->save(false);

                    break;
            }

            $transaction->commit();

            return true;
        }
        catch( \yii\web\HttpException $ex )
        {
            $transaction->rollBack();

            return false;
        }
    }

    private function atualizarPedidosRelacionados($oferta_id)
    {
        $pedidos = Pedido::findAll([ "oferta_id" => $this->oferta_id]);

        foreach( $pedidos as $pedido )
        {
            if( $this->pedido_id != $pedido->pedido_id && ( $pedido->status_id == Pedido::STATUS_PENDENTE || $pedido->status_id == Pedido::STATUS_EMANDAMENTO ) )
            {
                $pedido->oferta_id = $oferta_id;
                $pedido->save(false);
            }
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensagens()
    {
        return $this->hasMany(Mensagem::className(), [ 'pedido_id' => 'pedido_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(StatusPedido::className(), [ 'status_id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOferta()
    {
        return $this->hasOne(Oferta::className(), [ 'oferta_id' => 'oferta_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumidor()
    {
        return $this->hasOne(Consumidor::className(), [ 'consumidor_id' => 'consumidor_id']);
    }

}

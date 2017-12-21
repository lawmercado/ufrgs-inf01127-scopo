<?php

namespace app\modules\base\models;

use Yii;

/**
 * This is the model class for table "Pessoa".
 *
 * @property integer $pessoa_id
 * @property string $nome
 * @property string $email
 * @property string $endereco
 * @property string $cidade
 * @property string $cep
 * @property string $estado
 *
 * @property Consumidor[] $consumidores
 * @property Mensagem[] $mensagens
 * @property Produtor[] $produtores
 */
class Pessoa extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Pessoa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'nome', 'email', 'endereco', 'cidade', 'cep', 'estado'], 'required'],
            [ [ 'cep'], 'integer'],
            [ [ 'cep'], 'string', 'max' => 8, 'min' => 8],
            [ [ 'email'], 'email'],
            [ [ 'nome', 'endereco'], 'string', 'max' => 100],
            [ [ 'cidade'], 'string', 'max' => 50],
            [ [ 'estado'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pessoa_id' => 'Identificador',
            'nome'      => 'Nome',
            'email'     => 'E-mail',
            'endereco'  => 'Endereço',
            'cidade'    => 'Cidade',
            'cep'       => 'CEP',
            'estado'    => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumidores()
    {
        return $this->hasMany(Consumidor::className(), [ 'pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensagens()
    {
        return $this->hasMany(Mensagem::className(), [ 'pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutores()
    {
        return $this->hasMany(Produtor::className(), [ 'pessoa_id' => 'pessoa_id']);
    }

}

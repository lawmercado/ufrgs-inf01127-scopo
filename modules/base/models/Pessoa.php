<?php

namespace app\modules\base\models;

use Yii;

/**
 * This is the model class for table "Pessoa".
 *
 * @property integer $pessoa_id
 * @property string $nome
 * @property string $endereco
 * @property string $cidade
 * @property integer $cep
 * @property string $estado
 *
 * @property Consumidor[] $consumidors
 * @property Mensagem[] $mensagems
 * @property Produtor[] $produtors
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
            [['nome', 'endereco', 'cidade', 'cep', 'estado'], 'required'],
            [['cep'], 'integer'],
            [['nome', 'endereco'], 'string', 'max' => 100],
            [['cidade'], 'string', 'max' => 50],
            [['estado'], 'string', 'max' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pessoa_id' => 'Identificador',
            'nome' => 'Nome',
            'endereco' => 'Endereço',
            'cidade' => 'Cidade',
            'cep' => 'CEP',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsumidors()
    {
        return $this->hasMany(Consumidor::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMensagems()
    {
        return $this->hasMany(Mensagem::className(), ['pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutors()
    {
        return $this->hasMany(Produtor::className(), ['pessoa_id' => 'pessoa_id']);
    }
}

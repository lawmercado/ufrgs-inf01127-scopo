<?php

namespace app\modules\base\models;

use Yii;

/**
 * This is the model class for table "Produtor".
 *
 * @property integer $produtor_id
 * @property string $cnpj
 * @property integer $pessoa_id
 *
 * @property Oferta[] $ofertas
 * @property Pessoa $pessoa
 */
class Produtor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Produtor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cnpj', 'pessoa_id'], 'required'],
            [['pessoa_id'], 'integer'],
            [['cnpj'], 'integer'],
            [['cnpj'], 'string', 'max' => 14, 'min' => 14],
            [['pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => ['pessoa_id' => 'pessoa_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'produtor_id' => 'ID',
            'cnpj' => 'CNPJ',
            'pessoa_id' => 'Pessoa associada',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertas()
    {
        return $this->hasMany(Oferta::className(), ['produtor_id' => 'produtor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(Pessoa::className(), ['pessoa_id' => 'pessoa_id']);
    }
    
    public function getRelPessoa()
{
        return $this->hasOne(Pessoa::className(), ['pessoa_id' => 'pessoa_id']);
}
}

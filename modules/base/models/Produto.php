<?php

namespace app\modules\base\models;

use Yii;

/**
 * This is the model class for table "Produto".
 *
 * @property integer $produto_id
 * @property string $nome
 * @property integer $categoria_id
 *
 * @property Oferta[] $ofertas
 * @property Categoria $categoria
 */
class Produto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Produto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'categoria_id'], 'required'],
            [['categoria_id'], 'integer'],
            [['nome'], 'string', 'max' => 45],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'categoria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'produto_id' => 'ID',
            'nome' => 'Nome',
            'categoria_id' => 'Categoria',
            'Categoria.descricao' => 'Categoria',
            'categoria.descricao' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertas()
    {
        return $this->hasMany(Oferta::className(), ['produto_id' => 'produto_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['categoria_id' => 'categoria_id']);
    }
    
}

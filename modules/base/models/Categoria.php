<?php

namespace app\modules\base\models;

use Yii;

/**
 * This is the model class for table "Categoria".
 *
 * @property integer $categoria_id
 * @property string $descricao
 *
 * @property Produto[] $produtos
 */
class Categoria extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'descricao'], 'required'],
            [ [ 'descricao'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoria_id' => 'ID',
            'descricao'    => 'Descrição',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produto::className(), [ 'categoria_id' => 'categoria_id']);
    }

}

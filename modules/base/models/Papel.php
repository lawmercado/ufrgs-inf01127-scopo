<?php

namespace app\modules\base\models;

use Yii;

/**
 * This is the model class for table "papel".
 *
 * @property integer $papel_id
 * @property string $descricao
 *
 * @property Usuario[] $usuarios
 */
class Papel extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Papel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'descricao'], 'required'],
            [ [ 'descricao'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'papel_id'  => 'Identificador',
            'descricao' => 'Descrição',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), [ 'papel_id' => 'papel_id']);
    }

}

<?php

namespace app\modules\base\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $usuario_id
 * @property string $login
 * @property string $senha
 * @property integer $pessoa_id
 * @property integer $papel_id
 *
 * @property Pessoa $pessoa
 * @property Papel $papel
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    const PAPEL_ADMINISTRADOR = 1;
    const PAPEL_PRODUTOR      = 2;
    const PAPEL_CONSUMIDOR    = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [ [ 'login', 'senha', 'pessoa_id', 'papel_id'], 'required'],
            [ [ 'pessoa_id', 'papel_id'], 'integer'],
            [ [ 'login'], 'string', 'max' => 20],
            [ [ 'senha'], 'string', 'max' => 32],
            [ [ 'pessoa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pessoa::className(), 'targetAttribute' => [ 'pessoa_id' => 'pessoa_id']],
            [ [ 'papel_id'], 'exist', 'skipOnError' => true, 'targetClass' => Papel::className(), 'targetAttribute' => [ 'papel_id' => 'papel_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usuario_id' => 'Identificador',
            'login'      => 'Login',
            'senha'      => 'Senha',
            'pessoa_id'  => 'Pessoa associada',
            'papel_id'   => 'Papel associado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPessoa()
    {
        return $this->hasOne(Pessoa::className(), [ 'pessoa_id' => 'pessoa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPapel()
    {
        return $this->hasOne(Papel::className(), [ 'papel_id' => 'papel_id']);
    }

    public function getAuthKey()
    {
        return null;
    }

    public function getId()
    {
        return $this->usuario_id;
    }

    public function validateAuthKey($authKey)
    {
        return null;
    }

    public static function findIdentity($id)
    {
        return Usuario::findOne([ 'usuario_id' => $id]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return Usuario
     */
    public static function findByUsername($username)
    {
        return Usuario::findOne([ 'login' => $username]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === md5($password);
    }

    public function matchPapel($papel_id)
    {
        return $this->papel_id === $papel_id;
    }

    public function beforeSave($insert)
    {
        if( parent::beforeSave($insert) )
        {
            // Cria o hash da senha
            $this->senha = md5($this->senha);

            return true;
        }
        else
        {
            return false;
        }
    }

}

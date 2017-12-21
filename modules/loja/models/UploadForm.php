<?php

namespace app\modules\loja\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{

    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png, jpeg'],
        ];
    }

    public function upload($path)
    {
        if( $this->validate() )
        {
            $this->imageFile->saveAs($path);
            return true;
        }
        else
        {
            return false;
        }
    }

}

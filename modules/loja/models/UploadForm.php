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
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg'],
        ];
    }
    
    public function upload($model)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('images/' . $model->oferta_id . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}


<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadFile extends Model
{
    /**
     * @var UploadedFile
     */
    public $archivoFile;

    public function rules()
    {
        return [
            [['archivoFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->archivoFile->saveAs('archivos/' . $this->archivoFile->baseName . '.' . $this->archivoFile->extension);
            return true;
        } else {
            return false;
        }
    }
}

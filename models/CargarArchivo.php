<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
*/
class CargarArchivo extends Model
{
/**
 * @var UploadedFile|Null file attribute
 */
public $archivo;

/**
 * @return array the validation rules.
 */
public function rules()
{
    return [
        [['archivo'], 'required'],
        [['archivo'], 'file',  'skipOnEmpty' => false, 'extensions'=>'csv'],
    ];
}
}
?>

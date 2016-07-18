<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sexo".
 *
 * @property integer $SexoID
 * @property string $SexoNombre
 * @property string $SexoDescripcion
 *
 * @property Curriculum[] $curriculums
 */
class Sexo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sexo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SexoID'], 'required'],
            [['SexoID'], 'integer'],
            [['SexoNombre', 'SexoDescripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SexoID' => 'Sexo ID',
            'SexoNombre' => 'Sexo Nombre',
            'SexoDescripcion' => 'Sexo Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurriculums()
    {
        return $this->hasMany(Curriculum::className(), ['Sexo_SexoID' => 'SexoID']);
    }
}

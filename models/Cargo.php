<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property integer $CargoID
 * @property string $CargoNombre
 * @property string $CargoDescripcion
 * @property string $CargoFechaReg
 *
 * @property Usuario[] $usuarios
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CargoID', 'CargoNombre', 'CargoFechaReg'], 'required'],
            [['CargoID'], 'integer'],
            [['CargoFechaReg'], 'safe'],
            [['CargoNombre', 'CargoDescripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CargoID' => 'Cargo ID',
            'CargoNombre' => 'Cargo Nombre',
            'CargoDescripcion' => 'Cargo Descripcion',
            'CargoFechaReg' => 'Cargo Fecha Reg',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['CargoID' => 'CargoID']);
    }
}

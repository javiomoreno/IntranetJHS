<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rol".
 *
 * @property integer $RolID
 * @property string $RolNombre
 * @property string $RolDescripcion
 * @property string $RolFechaReg
 *
 * @property Usuario[] $usuarios
 */
class Rol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RolNombre', 'RolFechaReg'], 'required'],
            [['RolID'], 'integer'],
            [['RolFechaReg'], 'safe'],
            [['RolNombre'], 'string', 'max' => 40],
            [['RolDescripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RolID' => 'Rol ID',
            'RolNombre' => 'Rol Nombre',
            'RolDescripcion' => 'Rol Descripcion',
            'RolFechaReg' => 'Rol Fecha Reg',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['RolID' => 'RolID']);
    }
}

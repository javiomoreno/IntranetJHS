<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property integer $EmpresaID
 * @property string $EmpresaNombre
 * @property string $EmpresaDescripcion
 * @property string $EmpresaFechaReg
 * @property string $EmpresaRIF
 *
 * @property Usuario[] $usuarios
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EmpresaNombre', 'EmpresaFechaReg', 'EmpresaRIF'], 'required'],
            [['EmpresaID'], 'integer'],
            [['EmpresaFechaReg'], 'safe'],
            [['EmpresaNombre'], 'string', 'max' => 50],
            [['EmpresaDescripcion'], 'string', 'max' => 100],
            [['EmpresaRIF'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EmpresaID' => 'Empresa ID',
            'EmpresaNombre' => 'Empresa Nombre',
            'EmpresaDescripcion' => 'Empresa Descripcion',
            'EmpresaFechaReg' => 'Empresa Fecha Reg',
            'EmpresaRIF' => 'Empresa Rif',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuario::className(), ['EmpresaID' => 'EmpresaID']);
    }
}

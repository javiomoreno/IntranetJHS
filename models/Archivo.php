<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archivo".
 *
 * @property integer $ArchivoID
 * @property string $ArchivoNombre
 * @property string $ArchivoDescripcion
 * @property string $ArchivoRuta
 * @property string $ArchivoFechaReg
 * @property integer $EmpresaID
 *
 * @property Empresa $empresa
 */
class Archivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'archivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ArchivoID', 'EmpresaID'], 'required'],
            [['ArchivoID', 'EmpresaID'], 'integer'],
            [['ArchivoFechaReg'], 'safe'],
            [['ArchivoNombre'], 'string', 'max' => 50],
            [['ArchivoDescripcion'], 'string', 'max' => 200],
            [['ArchivoRuta'], 'string', 'max' => 100],
            [['EmpresaID'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['EmpresaID' => 'EmpresaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ArchivoID' => 'Archivo ID',
            'ArchivoNombre' => 'Archivo Nombre',
            'ArchivoDescripcion' => 'Archivo Descripcion',
            'ArchivoRuta' => 'Archivo Ruta',
            'ArchivoFechaReg' => 'Archivo Fecha Reg',
            'EmpresaID' => 'Empresa ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['EmpresaID' => 'EmpresaID']);
    }
}

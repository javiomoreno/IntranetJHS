<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "departamento".
 *
 * @property integer $DepartamentoID
 * @property string $DepartamentoNombre
 * @property string $DepartamentoDescripcion
 * @property string $DepartamentoFechaReg
 * @property integer $EmpresaID
 *
 * @property Empresa $empresa
 * @property Parametroempresa[] $parametroempresas
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EmpresaID'], 'required'],
            [['DepartamentoID', 'EmpresaID'], 'integer'],
            [['DepartamentoFechaReg'], 'safe'],
            [['DepartamentoNombre'], 'string', 'max' => 50],
            [['DepartamentoDescripcion'], 'string', 'max' => 200],
            [['EmpresaID'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['EmpresaID' => 'EmpresaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DepartamentoID' => 'Departamento ID',
            'DepartamentoNombre' => 'Departamento Nombre',
            'DepartamentoDescripcion' => 'Departamento Descripcion',
            'DepartamentoFechaReg' => 'Departamento Fecha Reg',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametroempresas()
    {
        return $this->hasMany(Parametroempresa::className(), ['Departamento_DepartamentoID' => 'DepartamentoID']);
    }

    public static function getListaEmpresas(){
        $opciones = Empresa::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'EmpresaID', 'EmpresaNombre');
    }

}

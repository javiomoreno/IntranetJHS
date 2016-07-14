<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "parametroempresa".
 *
 * @property integer $ParametroID
 * @property string $ParametroNombre
 * @property string $ParametroValor
 * @property string $ParametroFechaReg
 * @property integer $EmpresaID
 * @property integer $Departamento_DepartamentoID
 *
 * @property Departamento $departamentoDepartamento
 * @property Empresa $empresa
 */
class Parametroempresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametroempresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ParametroNombre'], 'required'],
            [['ParametroID', 'EmpresaID', 'Departamento_DepartamentoID'], 'integer'],
            [['ParametroFechaReg'], 'safe'],
            [['ParametroNombre'], 'string', 'max' => 20],
            [['ParametroValor'], 'string', 'max' => 1000],
            [['Departamento_DepartamentoID'], 'exist', 'skipOnError' => true, 'targetClass' => Departamento::className(), 'targetAttribute' => ['Departamento_DepartamentoID' => 'DepartamentoID']],
            [['EmpresaID'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['EmpresaID' => 'EmpresaID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ParametroID' => 'Parametro ID',
            'ParametroNombre' => 'Parametro Nombre',
            'ParametroValor' => 'Parametro Valor',
            'ParametroFechaReg' => 'Parametro Fecha Reg',
            'EmpresaID' => 'Empresa ID',
            'Departamento_DepartamentoID' => 'Departamento  Departamento ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartamentoDepartamento()
    {
        return $this->hasOne(Departamento::className(), ['DepartamentoID' => 'Departamento_DepartamentoID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['EmpresaID' => 'EmpresaID']);
    }

    public static function getListaEmpresas(){
        $opciones = Empresa::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'EmpresaID', 'EmpresaNombre');
    }

    public static function getListaDepartamentos(){
        $opciones = Departamento::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'DepartamentoID', 'DepartamentoNombre');
    }
}

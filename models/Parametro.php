<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parametro".
 *
 * @property integer $ParametroID
 * @property string $ParametroCodigo
 * @property string $ParametroDescripcion
 * @property string $ParametroValorAuxiliar
 * @property double $ParametroAsignaciones
 * @property double $ParametroDeducciones
 * @property double $ParametroNetoaCobrar
 * @property string $ParametroFechaReg
 * @property integer $ReciboID
 *
 * @property Recibo $recibo
 */
class Parametro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ParametroFechaReg', 'ReciboID'], 'required'],
            [['ParametroID', 'ReciboID'], 'integer'],
            [['ParametroAsignaciones', 'ParametroDeducciones', 'ParametroNetoaCobrar'], 'number'],
            [['ParametroFechaReg'], 'safe'],
            [['ParametroCodigo'], 'string', 'max' => 10],
            [['ParametroDescripcion'], 'string', 'max' => 100],
            [['ParametroValorAuxiliar'], 'string', 'max' => 20],
            [['ReciboID'], 'exist', 'skipOnError' => true, 'targetClass' => Recibo::className(), 'targetAttribute' => ['ReciboID' => 'ReciboID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ParametroID' => 'Parametro ID',
            'ParametroCodigo' => 'Parametro Codigo',
            'ParametroDescripcion' => 'Parametro Descripcion',
            'ParametroValorAuxiliar' => 'Parametro Valor Auxiliar',
            'ParametroAsignaciones' => 'Parametro Asignaciones',
            'ParametroDeducciones' => 'Parametro Deducciones',
            'ParametroNetoaCobrar' => 'Parametro Netoa Cobrar',
            'ParametroFechaReg' => 'Parametro Fecha Reg',
            'ReciboID' => 'Recibo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibo()
    {
        return $this->hasOne(Recibo::className(), ['ReciboID' => 'ReciboID']);
    }
}

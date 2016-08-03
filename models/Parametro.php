<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parametro".
 *
 * @property integer $ParametroID
 * @property string $ParametroCodigo
 * @property string $ParametroValorAuxiliar
 * @property string $ParametroValor
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
            [['ParametroFechaReg'], 'safe'],
            [['ParametroCodigo'], 'string', 'max' => 10],
            [['ParametroValorAuxiliar'], 'string', 'max' => 20],
            [['ParametroValor'], 'string', 'max' => 50],
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
            'ParametroValorAuxiliar' => 'Parametro Valor Auxiliar',
            'ParametroValor' => 'Parametro Valor',
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

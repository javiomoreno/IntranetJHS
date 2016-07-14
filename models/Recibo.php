<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recibo".
 *
 * @property integer $ReciboID
 * @property string $ReciboFechaInicio
 * @property string $ReciboFechaFin
 * @property integer $ReciboNumero
 * @property string $Recibocol
 * @property integer $UsuarioID
 *
 * @property Parametro[] $parametros
 * @property Usuario $usuario
 */
class Recibo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recibo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ReciboID', 'UsuarioID'], 'required'],
            [['ReciboID', 'ReciboNumero', 'UsuarioID'], 'integer'],
            [['ReciboFechaInicio', 'ReciboFechaFin'], 'safe'],
            [['Recibocol'], 'string', 'max' => 45],
            [['UsuarioID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['UsuarioID' => 'UsuarioID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ReciboID' => 'Recibo ID',
            'ReciboFechaInicio' => 'Recibo Fecha Inicio',
            'ReciboFechaFin' => 'Recibo Fecha Fin',
            'ReciboNumero' => 'Recibo Numero',
            'Recibocol' => 'Recibocol',
            'UsuarioID' => 'Usuario ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametros()
    {
        return $this->hasMany(Parametro::className(), ['ReciboID' => 'ReciboID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['UsuarioID' => 'UsuarioID']);
    }
}

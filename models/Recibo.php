<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recibo".
 *
 * @property integer $ReciboID
 * @property string $ReciboFecha
 * @property integer $ReciboNumero
 * @property double $ReciboSuelDiar
 * @property double $ReciboSuelSema
 * @property double $ReciboSuelMens
 * @property double $ReciboAsignacion
 * @property double $ReciboDeduccion
 * @property double $ReciboRetencion
 * @property double $ReciboTotal
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
            [['UsuarioID'], 'required'],
            [['ReciboID', 'ReciboNumero', 'UsuarioID'], 'integer'],
            [['ReciboFecha'], 'safe'],
            [['ReciboSuelDiar', 'ReciboSuelSema', 'ReciboSuelMens', 'ReciboAsignacion', 'ReciboDeduccion', 'ReciboRetencion', 'ReciboTotal'], 'number'],
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
            'ReciboFecha' => 'Recibo Fecha',
            'ReciboNumero' => 'Recibo Numero',
            'ReciboSuelDiar' => 'Recibo Suel Diar',
            'ReciboSuelSema' => 'Recibo Suel Sema',
            'ReciboSuelMens' => 'Recibo Suel Mens',
            'ReciboAsignacion' => 'Recibo Asignacion',
            'ReciboDeduccion' => 'Recibo Deduccion',
            'ReciboRetencion' => 'Recibo Retencion',
            'ReciboTotal' => 'Recibo Total',
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

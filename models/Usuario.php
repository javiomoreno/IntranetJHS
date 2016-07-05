<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $UsuarioID
 * @property string $UsuarioNombre
 * @property string $UsuarioApellido
 * @property string $UsuarrioCedula
 * @property string $UsuarioCorreo
 * @property string $UsuarioClave
 * @property string $UsuarioFechaNac
 * @property string $UsuarioFechaIng
 * @property string $UsuarioBanco
 * @property string $UsuarioCuentaBanco
 * @property string $UsuarioFechaReg
 * @property integer $RolID
 * @property integer $EmpresaID
 * @property integer $CargoID
 *
 * @property Recibo[] $recibos
 * @property Cargo $cargo
 * @property Empresa $empresa
 * @property Rol $rol
 */
class Usuario extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UsuarioID', 'UsuarioNombre', 'UsuarioApellido', 'UsuarrioCedula', 'UsuarioCorreo', 'UsuarioClave', 'UsuarioFechaIng', 'UsuarioBanco', 'UsuarioFechaReg', 'RolID', 'EmpresaID', 'CargoID'], 'required'],
            [['UsuarioID', 'RolID', 'EmpresaID', 'CargoID'], 'integer'],
            [['UsuarioFechaNac', 'UsuarioFechaIng', 'UsuarioFechaReg'], 'safe'],
            [['UsuarioNombre', 'UsuarioApellido', 'UsuarioCorreo', 'UsuarioClave', 'UsuarioCuentaBanco'], 'string', 'max' => 100],
            [['UsuarrioCedula'], 'string', 'max' => 20],
            [['UsuarioBanco'], 'string', 'max' => 50],
            [['UsuarrioCedula'], 'unique'],
            [['UsuarioCorreo'], 'unique'],
            [['CargoID'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['CargoID' => 'CargoID']],
            [['EmpresaID'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['EmpresaID' => 'EmpresaID']],
            [['RolID'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['RolID' => 'RolID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UsuarioID' => 'Usuario ID',
            'UsuarioNombre' => 'Usuario Nombre',
            'UsuarioApellido' => 'Usuario Apellido',
            'UsuarrioCedula' => 'Usuarrio Cedula',
            'UsuarioCorreo' => 'Usuario Correo',
            'UsuarioClave' => 'Usuario Clave',
            'UsuarioFechaNac' => 'Usuario Fecha Nac',
            'UsuarioFechaIng' => 'Usuario Fecha Ing',
            'UsuarioBanco' => 'Usuario Banco',
            'UsuarioCuentaBanco' => 'Usuario Cuenta Banco',
            'UsuarioFechaReg' => 'Usuario Fecha Reg',
            'RolID' => 'Rol ID',
            'EmpresaID' => 'Empresa ID',
            'CargoID' => 'Cargo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecibos()
    {
        return $this->hasMany(Recibo::className(), ['UsuarioID' => 'UsuarioID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargo()
    {
        return $this->hasOne(Cargo::className(), ['CargoID' => 'CargoID']);
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
    public function getRol()
    {
        return $this->hasOne(Rol::className(), ['RolID' => 'RolID']);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['UsuarioID' => $id]);
    }

    public static function getListaRoles(){
        $opciones = Rol::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'RolID', 'RolNombre');
    }

    public static function getListaEmpresas(){
        $opciones = Empresa::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'EmpresaID', 'EmpresaNombre');
    }

    public static function getListaCargos(){
        $opciones = Cargo::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'CargoID', 'CargoNombre');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['UsuarrioCedula' => $username]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($usuaemai)
    {
        return static::findOne(['correo' => $usuaemai]);
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
      if (base64_decode($this->UsuarioClave) == $password) {
        return true;
      }
      return false;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->UsuarioClave = base64_encode($password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @return password Decodificado
     */
    public function getPassword()
    {
        return base64_decode($this->UsuarioClave);
    }


        /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
    }

        /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
}

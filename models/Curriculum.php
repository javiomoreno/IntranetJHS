<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "curriculum".
 *
 * @property integer $CurriculumID
 * @property string $CurriculumNombre
 * @property string $CurriculumApellido
 * @property string $CurriculumCedula
 * @property string $CurriculumFechNaci
 * @property string $CurriculumLugNaci
 * @property string $CurriculumDireccion
 * @property string $CurriculumTeleFijo
 * @property string $CurriculumTeleCelu
 * @property string $CurriculumEmail
 * @property string $CurriculumExpeLabo
 * @property string $CurriculumEstuReal
 * @property string $CurriculumCursReal
 * @property string $CurriculumDisponibilidad
 * @property resource $CurriculumArchivo
 * @property integer $Sexo_SexoID
 *
 * @property Sexo $sexoSexo
 */
class Curriculum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curriculum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CurriculumFechNaci'], 'safe'],
            [['CurriculumArchivo'], 'string'],
            [['Sexo_SexoID'], 'required'],
            [['Sexo_SexoID'], 'integer'],
            [['CurriculumNombre', 'CurriculumApellido', 'CurriculumCedula', 'CurriculumLugNaci', 'CurriculumTeleFijo', 'CurriculumTeleCelu', 'CurriculumDisponibilidad'], 'string', 'max' => 45],
            [['CurriculumDireccion', 'CurriculumExpeLabo'], 'string', 'max' => 200],
            [['CurriculumEmail', 'CurriculumEstuReal', 'CurriculumCursReal'], 'string', 'max' => 100],
            [['Sexo_SexoID'], 'exist', 'skipOnError' => true, 'targetClass' => Sexo::className(), 'targetAttribute' => ['Sexo_SexoID' => 'SexoID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CurriculumID' => 'Curriculum ID',
            'CurriculumNombre' => 'Curriculum Nombre',
            'CurriculumApellido' => 'Curriculum Apellido',
            'CurriculumCedula' => 'Curriculum Cedula',
            'CurriculumFechNaci' => 'Curriculum Fech Naci',
            'CurriculumLugNaci' => 'Curriculum Lug Naci',
            'CurriculumDireccion' => 'Curriculum Direccion',
            'CurriculumTeleFijo' => 'Curriculum Tele Fijo',
            'CurriculumTeleCelu' => 'Curriculum Tele Celu',
            'CurriculumEmail' => 'Curriculum Email',
            'CurriculumExpeLabo' => 'Curriculum Expe Labo',
            'CurriculumEstuReal' => 'Curriculum Estu Real',
            'CurriculumCursReal' => 'Curriculum Curs Real',
            'CurriculumDisponibilidad' => 'Curriculum Disponibilidad',
            'CurriculumArchivo' => 'Curriculum Archivo',
            'Sexo_SexoID' => 'Sexo  Sexo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSexoSexo()
    {
        return $this->hasOne(Sexo::className(), ['SexoID' => 'Sexo_SexoID']);
    }

    public static function getListaSexos(){
        $opciones = Sexo::find()->asArray()->all();
        return ArrayHelper::map($opciones, 'SexoID', 'SexoNombre');
    }

    public static function getListaDisponibilidades(){
        $opciones = [
          [
            'DisponibilidadID' => '1',
            'DisponibilidadNombre' => 'Mañana',
          ],
          [
            'DisponibilidadID' => '2',
            'DisponibilidadNombre' => 'Tarde',
          ],
          [
            'DisponibilidadID' => '3',
            'DisponibilidadNombre' => 'Todo el Día',
          ],
        ];
        return ArrayHelper::map($opciones, 'DisponibilidadID', 'DisponibilidadNombre');
    }

}

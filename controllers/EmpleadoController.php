<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
use app\models\Recibo;
use app\models\Usuario;

class EmpleadoController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['Empleado'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout ="main-empleado";
        return $this->render('index');
    }

    public function actionConsultarRecibos()
    {
        $this->layout ="main-empleado";
        $model = Recibo::find()->where(['UsuarioID' => \Yii::$app->user->getId()])->all();
        return $this->render('consultar-recibos', ['model' => $model]);
    }

    public function actionLaEmpresa()
    {
        $this->layout ="main-empleado";
        return $this->render('la-empresa');
    }

    public function actionMisionVision()
    {
        $this->layout ="main-empleado";
        return $this->render('mision-vision');
    }

    public function actionPerfil()
    {
        $this->layout ="main-empleado";
        return $this->render('perfil');
    }

    public function actionRecursosHumanos()
    {
        $this->layout ="main-empleado";
        return $this->render('recursos-humanos');
    }

    public function actionSolicitudes()
    {
        $this->layout ="main-empleado";
        return $this->render('solicitudes');
    }

    public function actionValores()
    {
        $this->layout ="main-empleado";
        return $this->render('valores');
    }

    public function actionCreateSolicitud(){
        $this->layout ="main-empleado";
        $model = Usuario::findOne(\Yii::$app->user->getId());
        $model2 = Recibo::find()->where(['UsuarioID' => \Yii::$app->user->getId()])->orderBy(['ReciboFechRegi' => SORT_ASC])->one()->ReciboSuelMens;
        return $this->render('solicitudes', ['model' => $model, 'model2' => $model2]);
    }

}

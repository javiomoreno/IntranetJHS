<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Curriculum;
use app\models\UploadFile;
use yii\web\UploadedFile;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
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
        $this->layout ="main";
        if (!\Yii::$app->user->isGuest) {
          if(Yii::$app->request->referrer){
            return $this->redirect(Yii::$app->request->referrer);
          }else{
            return $this->goBack();
          }
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(\Yii::$app->user->can('Administrador')){
                return Yii::$app->getResponse()->redirect(array('/administrador/index'));
            }
            else if(\Yii::$app->user->can('Empleado')){
                return Yii::$app->getResponse()->redirect(array('/empleado/index'));
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionRegistrar()
    {
        $this->layout ="main";
        $model = new Curriculum();
        $modelArchivo = new UploadFile();
        if ($model->load(Yii::$app->request->post()) && $modelArchivo->load(Yii::$app->request->post())) {
            $modelArchivo->archivoFile = UploadedFile::getInstance($modelArchivo, 'archivoFile');
            if ($modelArchivo->upload()) {
              $model->CurriculumArchivo = $modelArchivo->archivoFile->baseName;
              $model->CurriculumFechNaci = date('Y/m/d', strtotime($model->CurriculumFechNaci));
              $model->save();
            }
            else{
              return $this->render('registrar', [
                  'model' => $model, 'modelArchivo' => $modelArchivo,
              ]);
            }
            return $this->goBack();
        }
        return $this->render('registrar', [
            'model' => $model, 'modelArchivo' => $modelArchivo,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}

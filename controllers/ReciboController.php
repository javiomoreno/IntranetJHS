<?php

namespace app\controllers;

use Yii;
use app\models\Recibo;
use app\models\CargarArchivo;
use app\models\Usuario;
use app\models\Parametro;
use app\models\search\ReciboSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;

/**
 * ReciboController implements the CRUD actions for Recibo model.
 */
class ReciboController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'view', 'update', 'cargar-archivo'],
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view', 'update', 'cargar-archivo'],
                        'allow' => true,
                        'roles' => ['Administrador'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Recibo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout ="main-administrador";
        $model = Recibo::find()->all();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Recibo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout ="main-administrador";
        $modelRecibo = $this->findModel($id);
        $modelUsuario = Usuario::find()->where(['UsuarioID' => $modelRecibo->UsuarioID])->one();
        $modelParametro = Parametro::find()->where(['ReciboID' => $modelRecibo->ReciboID])->all();
        return $this->render('view', [
            'modelRecibo' => $modelRecibo, 'modelUsuario' => $modelUsuario, 'modelParametro' => $modelParametro
        ]);
    }

    /**
     * Creates a new Recibo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout ="main-administrador";
        $model = new Recibo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ReciboID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Recibo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout ="main-administrador";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ReciboID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Recibo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Recibo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recibo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recibo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCargarArchivo()
    {
        $this->layout ="main-administrador";
        $model = new CargarArchivo();
        if (Yii::$app->request->isPost) {
          $file = UploadedFile::getInstance($model, 'archivo');
          $handle = fopen($file->tempName, 'r');
          $i = 0;
          if ($handle) {
            while (($line = fgetcsv($handle, 1000, '!')) != false ){
              $cantidad = count($line);
              $h = 0;
              $vectorCodigos = [];
              for ($j = 0; $j  < ($cantidad - 10); $j = $j + 3) {
                $vectorCodigos[$h] = [
                  "codigo" => $line[$j+10],
                  "v_aux" => $line[$j+11],
                  "valor" => $line[$j+12],
                ];
                $h ++;
              }
              $model2[$i] = [
                  "id" => $i,
                  "ceduempl" => $line[0],
                  "fechreci" => $line[1],
                  "numereci" => $line[2],
                  "sueldiar" => $line[3],
                  "suelsema" => $line[4],
                  "suelmens" => $line[5],
                  "canttota" => $line[6],
                  "asignaci" => $line[7],
                  "deduccio" => $line[8],
                  "retencio" => $line[9],
                  "codigos" => $vectorCodigos,
              ];
              $i ++;
            }
          }
          fclose($handle);
          return $this->render('cargar-registros', ['model2'=> $model2]);
        }
        return $this->render('cargar-archivo', ['model'=>$model]);
    }

    public function actionCargarRegistros()
    {
        $model = Yii::$app->request->post('model');
        $count = count($model);
        $bandera = false;
        $transaction = Yii::$app->db->beginTransaction();

        try {

            foreach ($model as $key => $value) {
              $model2 = new Recibo();
              $model2->ReciboFecha = date_create_from_format('Y/m/d', strtotime($value['fechreci']));
              $model2->ReciboNumero = intval($value['numereci']);
              $model2->ReciboSuelDiar =  (float) $value['sueldiar'];
              $model2->ReciboSuelSema =  (float) $value['suelsema'];
              $model2->ReciboSuelMens =  (float) $value['suelmens'];
              $model2->ReciboTotal =  (float) $value['canttota'];
              $model2->ReciboAsignacion =  (float) $value['asignaci'];
              $model2->ReciboDeduccion =  (float) $value['deduccio'];
              $model2->ReciboRetencion =  (float) $value['retencio'];
              $model2->UsuarioID = Usuario::find()->where(['UsuarioCedula' => $value['ceduempl']])->one()->UsuarioID;

              if (!$model2->save()) {
                $bandera = true;
                break;
              }
              else{
                for ($j = 0; $j < count($value['codigos']); $j ++) {
                  $model3 = new Parametro();
                  $model3->ReciboID = $model2->ReciboID;
                  $model3->ParametroCodigo = $value['codigos'][$j]['codigo'];
                  $model3->ParametroValorAuxiliar = $value['codigos'][$j]['v_aux'];
                  $model3->ParametroValor = $value['codigos'][$j]['valor'];
                  $model3->ParametroFechaReg = date('Y-m-d H:i:s');
                  $model3->save();
                }
              }
            }

            $transaction->commit();
            return \yii\helpers\Json::encode('ok');

        } catch (Exception $e) {

            $transaction->rollBack();

        }
    }
}

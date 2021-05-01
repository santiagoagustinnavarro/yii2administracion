<?php

namespace app\controllers;

use Yii;
use app\models\Movimiento;
use app\models\MovimientoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/** agregados**/
use app\models\MovimientoConcepto;
use app\models\MovimientoConceptoSearch;

use app\models\MovimientoTipo;
use app\models\MovimientoTipoSearch;

use app\models\RazonSocial;
use app\models\RazonSocialSearch;

use app\models\MovimientoPercepcion;
use app\models\MovimientoPercepcionSearch;


use yii\helpers\ArrayHelper;
use yii\filters\AccessControl;

/**
 * SalidaController implements the CRUD actions for Salida model.
 */
class MovimientoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','view','excel'],
                'rules' => [
                    // allow authenticated users
                    [   
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
            ],
        ]
        ];
    }

    /**
     * Lists all Salida models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovimientoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $filter_movimiento_tipo=  ArrayHelper::map(MovimientoTipo::find()->all(), 'id', 'nombre');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'filter_movimiento_tipo'=>$filter_movimiento_tipo,
        ]);
    }

    /**
     * Displays a single Salida model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Salida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movimiento();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }


        $model->fecha= date('Y-m-d');

        $select_concepto =  ArrayHelper::map(MovimientoConcepto::find()->all(), 'id', 'nombre');

        $select_movimiento =  ArrayHelper::map(MovimientoTipo::find()->all(), 'id', 'nombre');

        $select_cuit =  ArrayHelper::map(RazonSocial::find()->all(), 'id', 'nombre');

        $select_percepcion =  ArrayHelper::map(MovimientoPercepcion::find()->all(), 'id', 'provincia');

        return $this->renderAjax('create', [
            'model' => $model,
            'select_concepto' => $select_concepto,
            'select_movimiento' => $select_movimiento,
            'select_cuit' => $select_cuit,
            'select_percepcion' => $select_percepcion ,
        ]);
    }

    /**
     * Updates an existing Salida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $select_concepto =  ArrayHelper::map(MovimientoConcepto::find()->all(), 'id', 'nombre');

        $select_movimiento =  ArrayHelper::map(MovimientoTipo::find()->all(), 'id', 'nombre');

        $select_cuit =  ArrayHelper::map(RazonSocial::find()->all(), 'id', 'nombre');

        $select_percepcion =  ArrayHelper::map(MovimientoPercepcion::find()->all(), 'id', 'provincia');

        return $this->render('update', [
            'model' => $model,
            'select_concepto' => $select_concepto,
            'select_movimiento' => $select_movimiento,
            'select_cuit' => $select_cuit,
            'select_percepcion' => $select_percepcion ,
        ]);
    }

    /**
     * Deletes an existing Salida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Salida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Movimiento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Movimiento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public  function actionExcel( $movimiento_tipo_id)
    {

      $movimiento_tipo_id=2;
        $coleccion = Movimiento::find()->where(["movimiento_tipo_id" => $movimiento_tipo_id])->all();

        return $this->renderPartial('excel', ['coleccion'=>$coleccion]);

     }







}/// End: class MovimientoController extends Controller

<?php

namespace app\modules\loja\controllers;

use Yii;
use app\modules\loja\models\Pedido;
use app\modules\loja\models\Oferta;
use \app\modules\loja\models\Consumidor;
use app\modules\loja\models\PedidoSearch;
use yii\web\NotFoundHttpException;
use app\modules\base\models\Usuario;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\base\components\BaseAccessRule;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends LojaController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => BaseAccessRule::className(),
                ],
                'only' => ['index', 'create', 'update', 'view'],
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => true,
                        'roles' => [Usuario::PAPEL_ADMINISTRADOR],
                    ],
                    [
                        'actions' => ['index', 'view', 'update'],
                        'allow' => true,
                        'roles' => [Usuario::PAPEL_CONSUMIDOR, Usuario::PAPEL_PRODUTOR],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => [Usuario::PAPEL_CONSUMIDOR],
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
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedido();
        
        $oferta = Oferta::findOne(Yii::$app->request->get('oferta_id') ? Yii::$app->request->get('oferta_id') : $session["oferta_id"]);
            
        $consumidor = Consumidor::findOne(["pessoa_id" => Yii::$app->user->identity->pessoa_id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pedido_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'oferta' => $oferta,
                'consumidor' => $consumidor
            ]);
        }
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pedido_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pedido model.
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
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pedido::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

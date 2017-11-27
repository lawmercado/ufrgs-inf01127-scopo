<?php

namespace app\modules\loja\controllers;

use Yii;
use app\modules\loja\models\Consumidor;
use app\modules\base\models\Pessoa;
use app\modules\base\models\Usuario;
use app\modules\loja\models\ConsumidorSearch;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\base\components\BaseAccessRule;

/**
 * ConsumidorController implements the CRUD actions for Consumidor model.
 */
class ConsumidorController extends LojaController
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
                'only' => ['index','create','update', 'view', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'delete'],
                        'allow' => true,
                        'roles' => [Usuario::PAPEL_ADMINISTRADOR],
                    ],
                    [
                        'actions' => ['create', 'view', 'update'],
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
     * Lists all Consumidor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConsumidorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Consumidor model.
     * @return mixed
     */
    public function actionView()
    {
        $usuario = Yii::$app->user->identity;
        
        $consumidor = Consumidor::findOne(["pessoa_id" => $usuario->pessoa_id]);
        
        return $this->render('view', [
            'model' => $consumidor,
        ]);
    }

    /**
     * Creates a new Consumidor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Consumidor();
        $pessoa = new Pessoa();
        $usuario = new Usuario();

        if ($model->load(Yii::$app->request->post()) && $pessoa->load(Yii::$app->request->post()) && $usuario->load(Yii::$app->request->post())) {
            $pessoa->save();
            
            $model->pessoa_id = $pessoa->pessoa_id;
            $model->save();
            
            $usuario->pessoa_id = $pessoa->pessoa_id;
            $usuario->login = $model->cpf;
            $usuario->papel_id = Usuario::PAPEL_CONSUMIDOR;
            $usuario->save();
            
            return $this->goBack();
        } else {
            return $this->render('create', [
                'model' => $model,
                'pessoa' => $pessoa,
                'usuario' => $usuario
            ]);
        }
    }

    /**
     * Updates an existing Consumidor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pessoa = $model->pessoa;
        $usuario = Yii::$app->user->identity;
        
        if ($model->load(Yii::$app->request->post()) && $pessoa->load(Yii::$app->request->post()) && $usuario->load(Yii::$app->request->post()) ) {
            $pessoa->save();
            $model->save();
            $usuario->save();
            
            return $this->redirect(['view', 'id' => $model->consumidor_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'pessoa' => $pessoa,
                'usuario' => $usuario
            ]);
        }
    }

    /**
     * Deletes an existing Consumidor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->pessoa->delete();
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Consumidor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Consumidor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Consumidor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

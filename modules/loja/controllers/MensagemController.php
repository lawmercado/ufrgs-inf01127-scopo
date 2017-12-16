<?php

namespace app\modules\loja\controllers;

use Yii;
use app\modules\loja\models\Mensagem;
use app\modules\loja\models\MensagemSearch;
use app\modules\loja\models\Pedido;
use app\modules\base\models\Pessoa;
use app\modules\base\models\Usuario;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\modules\base\components\BaseAccessRule;

/**
 * MensagemController implements the CRUD actions for Mensagem model.
 */
class MensagemController extends LojaController
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
                'only' => ['index', 'create'],
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => [Usuario::PAPEL_ADMINISTRADOR],
                    ],
                    [
                        'actions' => ['create'],
                        'allow' => true,
                        'roles' => [Usuario::PAPEL_CONSUMIDOR, Usuario::PAPEL_PRODUTOR],
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
     * Lists all Mensagem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MensagemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Creates a new Mensagem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($pedido_id)
    {
        $pedido = Pedido::findOne(["pedido_id" => $pedido_id]);
        $pessoa = Pessoa::findOne(["pessoa_id" => Yii::$app->user->identity->pessoa_id]);
        $mensagens = Mensagem::findAll(["pedido_id" => $pedido_id]);
        
        $model = new Mensagem();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['create', 'pedido_id' => $pedido_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'pedido' => $pedido,
                'pessoa' => $pessoa,
                'mensagens' => $mensagens
            ]);
        }
    }

    /**
     * Finds the Mensagem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mensagem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mensagem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

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
use yii\data\ActiveDataProvider;

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
                'class'      => AccessControl::className(),
                'ruleConfig' => [
                    'class' => BaseAccessRule::className(),
                ],
                'only'       => [ 'index', 'create', 'update', 'view'],
                'rules'      => [
                    [
                        'actions' => [ 'view'],
                        'allow'   => true,
                        'roles'   => [ Usuario::PAPEL_ADMINISTRADOR],
                    ],
                    [
                        'actions' => [ 'index', 'view', 'update'],
                        'allow'   => true,
                        'roles'   => [ Usuario::PAPEL_CONSUMIDOR, Usuario::PAPEL_PRODUTOR],
                    ],
                    [
                        'actions' => [ 'create'],
                        'allow'   => true,
                        'roles'   => [ Usuario::PAPEL_CONSUMIDOR],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => [ 'POST'],
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
        $pessoa_id = Yii::$app->user->identity->pessoa_id;
        $papel_id  = Yii::$app->user->identity->papel_id;

        switch( $papel_id )
        {
            case Usuario::PAPEL_PRODUTOR:
                $ofertas = Oferta::findAll([ "produtor_id" => \app\modules\base\models\Produtor::findOne([ "pessoa_id" => $pessoa_id])]);

                $dataProviderPendente    = PedidoSearch::searchByStatusAndOffers(Pedido::STATUS_PENDENTE, $ofertas);
                $dataProviderEmAndamento = PedidoSearch::searchByStatusAndOffers(Pedido::STATUS_EMANDAMENTO, $ofertas);
                $dataProviderFinalizado  = PedidoSearch::searchByStatusAndOffers(Pedido::STATUS_FINALIZADO, $ofertas);
                $dataProviderCancelado   = PedidoSearch::searchByStatusAndOffers(Pedido::STATUS_CANCELADO, $ofertas);

                return $this->render("index_produtor", [
                            'dataProviderPendente'    => $dataProviderPendente,
                            'dataProviderEmAndamento' => $dataProviderEmAndamento,
                            'dataProviderFinalizado'  => $dataProviderFinalizado,
                            'dataProviderCancelado'   => $dataProviderCancelado,
                ]);

            case Usuario::PAPEL_CONSUMIDOR:
                $consumidor = Consumidor::findOne([ "pessoa_id" => Yii::$app->user->identity->pessoa_id]);

                $query = Pedido::find();

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);

                $query->andFilterWhere([
                    'consumidor_id' => $consumidor->consumidor_id
                ]);

                $query->orderBy("momento DESC");

                return $this->render("index_consumidor", [
                            'dataProvider' => $dataProvider,
                ]);
        }
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

        $oferta = Oferta::findOne(Yii::$app->request->get('oferta_id'));

        $consumidor = Consumidor::findOne([ "pessoa_id" => Yii::$app->user->identity->pessoa_id]);

        if( $model->load(Yii::$app->request->post()) && $model->save() )
        {
            return $this->redirect(['view', 'id' => $model->pedido_id]);
        }
        else
        {
            return $this->render('create', [
                        'model'      => $model,
                        'oferta'     => $oferta,
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

        $status_id = Yii::$app->request->post("status_id");

        if( $status_id )
        {
            if( $model->alterarStatus($status_id) )
            {
                Yii::$app->session->setFlash("success", "Pedido atualizado com sucesso!");

                //return $this->redirect([ "index"]);
            }
            else
            {
                Yii::$app->session->setFlash("error", "Pedido não pode ser atualizado: não há a quantidade disponível. Verifique os pedidos em andamento!");
            }
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //$this->findModel($id)->delete();

        return $this->redirect([ 'index']);
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
        if( ($model = Pedido::findOne($id)) !== null )
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}

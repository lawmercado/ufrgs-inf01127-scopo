<?php

namespace app\modules\base\controllers;

use Yii;
use app\modules\base\models\Produtor;
use app\modules\base\models\Pessoa;
use app\modules\base\models\ProdutorSearch;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\base\components\BaseAccessRule;
use app\modules\base\models\Usuario;

/**
 * ProdutorController implements the CRUD actions for Produtor model.
 */
class ProdutorController extends BaseController
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
                'only' => [ 'index', 'create', 'update', 'view', 'delete' ],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [ Usuario::PAPEL_ADMINISTRADOR ],
                    ],
                    [
                        'actions' => [ 'view' ],
                        'allow' => true,
                        'roles' => [ Usuario::PAPEL_PRODUTOR ],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => [ 'POST' ],
                ],
            ],
        ];

    }

    /**
     * Lists all Produtor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdutorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Produtor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView( $id = 99999, $senha = 'Indisponivel' )
    {
        if ( $id == 99999 )
        {
            $id = Produtor::findOne([ "pessoa_id" => Yii::$app->user->identity->pessoa_id ]);
        }

        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
            'senha' => $senha,
        ]);

    }

    /**
     * Creates a new Produtor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produtor();
        $pessoa = new Pessoa();
        $usuario = new Usuario();

        if ( $model->load(Yii::$app->request->post()) && $pessoa->load(Yii::$app->request->post()) )
        {
            $pessoa->save();

            $model->pessoa_id = $pessoa->pessoa_id;
            $model->save();

            $usuario->pessoa_id = $pessoa->pessoa_id;
            $usuario->login = $model->cnpj;

            $senha = $this->geraSenha(6, true, true, false);
            $usuario->senha = $senha;

            $usuario->papel_id = Usuario::PAPEL_PRODUTOR;
            $usuario->save();

            return $this->redirect([ 'view', 'id' => $model->produtor_id, 'senha' => $senha ]);
        }
        else
        {
            return $this->render('create', [
                'model' => $model,
                'pessoa' => $pessoa,
                'usuario' => $usuario,
            ]);
        }

    }

    /**
     * Updates an existing Produtor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate( $id )
    {
        $model = $this->findModel($id);
        $pessoa = $model->pessoa;
        $usuario = $model->usuario;

        if ( $model->load(Yii::$app->request->post()) && $pessoa->load(Yii::$app->request->post()) )
        {
            $pessoa->save();
            $model->save();

            return $this->redirect([ 'view', 'id' => $model->produtor_id ]);
        }
        else
        {
            return $this->render('update', [
                'model' => $model,
                'pessoa' => $pessoa,
                'usuario' => $usuario
            ]);
        }

    }

    /**
     * Deletes an existing Produtor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete( $id )
    {
        $model = $this->findModel($id);
        $model->pessoa->delete();
        $model->delete();

        return $this->redirect([ 'index' ]);

    }

    /**
     * Finds the Produtor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produtor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel( $id )
    {
        if ( ($model = Produtor::findOne($id)) !== null )
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    function geraSenha( $tamanho = 8, $maiusculas = true, $numeros = true, $simbolos = false )
    {
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
        $retorno = '';
        $caracteres = '';
        $caracteres .= $lmin;

        if ( $maiusculas )
            $caracteres .= $lmai;
        if ( $numeros )
            $caracteres .= $num;
        if ( $simbolos )
            $caracteres .= $simb;

        $len = strlen($caracteres);

        for ( $n = 1; $n <= $tamanho; $n ++ )
        {
            $rand = mt_rand(1, $len);
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;

    }

    function debug( $mensagem = 'teste' )
    {
        Yii::trace($mensagem);
        $this->debug_to_console("TESTE");

    }

    function debug_to_console( $data )
    {
        $output = $data;
        if ( is_array($output) )
            $output = implode(',', $output);

        echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";

    }

}

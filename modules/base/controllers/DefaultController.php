<?php

namespace app\modules\base\controllers;

use Yii;
use app\modules\base\models\LoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\modules\base\components\BaseAccessRule;
use app\modules\base\models\Usuario;

/**
 * Default controller for the `base` module
 */
class DefaultController extends BaseController
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
                'only' => [ 'index', 'logout' ],
                'rules' => [
                    [
                        'actions' => [ 'logout' ],
                        'allow' => true,
                        'roles' => [ '@' ],
                    ],
                    [
                        'actions' => [ 'index' ],
                        'allow' => true,
                        'roles' => [ Usuario::PAPEL_ADMINISTRADOR ],
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => [ 'post' ],
                ],
            ],
        ];

    }

    /**
     * @inheritdoc
     */
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

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');

    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if ( ! Yii::$app->user->isGuest )
        {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ( $model->load(Yii::$app->request->post()) && $model->login() )
        {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);

    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();

    }

}

<?php

namespace app\modules\base\controllers;
use yii\web\Controller;

abstract class BaseController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout = '@app/modules/base/views/layouts/main.php';
        
        return parent::beforeAction($action);
    }
}


<?php

namespace app\modules\loja\controllers;
use yii\web\Controller;

abstract class LojaController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout = '@app/modules/loja/views/layouts/main.php';
        
        return parent::beforeAction($action);
    }
}


<?php

namespace app\modules\loja\controllers;

/**
 * Default controller for the `loja` module
 */
class DefaultController extends LojaController
{

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');

    }

}

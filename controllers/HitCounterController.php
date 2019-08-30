<?php
/*
 * @copyright Copyright (C) 2019 Sergio coderius <coderius>
 * @license This program is free software: the MIT License (MIT)
 */

namespace coderius\hitCounter\controllers;

use yii\web\Controller;
use modules\comments\Module;
use Yii;
use yii\web\Response;
use yii\web\ServerErrorHttpException;
use coderius\hitCounter\services\HitCounterService;

/**
 * Default controller.
 */
class HitCounterController extends Controller
{
    private $_service;

    public function __construct($id, $module, HitCounterService $service, $config = [])
    {
        $this->_service = $service;
        parent::__construct($id, $module, $config);
    }
    
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $qp = $request->get();
        // $qp = Yii::$app->getRequest()->getQueryParam($this->clientIdGetParamName);
        
        var_dump($this->_service->saveCounter($qp));
    }

}
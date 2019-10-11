<?php
/*
 * @copyright Copyright (C) 2019 Sergio coderius <coderius>
 * @license This program is free software: the MIT License (MIT)
 */

namespace coderius\hitCounter\controllers;

use yii\web\Controller;
use Yii;
use yii\web\Response;
use yii\web\ServerErrorHttpException;
use coderius\hitCounter\services\HitCounterService;
use coderius\hitCounter\models\HitCounterModel;

/**
 * Default controller.
 */
class HitCounterController extends Controller
{
    private $service;

    public function __construct($id, $module, HitCounterService $service, $config = [])
    {
        $this->service = $service;
        parent::__construct($id, $module, $config);
    }
    
    public function actionIndex()
    {
        $request = Yii::$app->request;
        $modelHitCounter = $this->service->loadModel($request);

        if ($modelHitCounter && $modelHitCounter->validate()) {
            try {
                $hit = $this->service->create($modelHitCounter);
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ['status' => 'success'];
            } catch (\DomainException $e) {
                Yii::$app->errorHandler->logException($e);
                \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return [
                    'status' => 'error',
                    // 'errors' => $e->getMessage(),
                ];
            }
        }

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $modelHitCounter->errors;
        // return $modelHitCounter->getAttributes();
    }

}
<?php

namespace coderius\hitCounter\services;

use Yii;
use yii\base\Component;
use coderius\hitCounter\components\helpers\UserClientInfo;
use coderius\hitCounter\components\helpers\UserServerInfo;
use yii\di\Instance;
use coderius\hitCounter\Module;

class HitCounterService extends Component{

    public function saveCounter($queryParams)
    {
        $module = Module::selfInstance();
        $os = $module->deviceDetector->getOs();

        $model = new BlogArticles();
        if ($model->load(Yii::$app->request->post()))
        {
            $mIsValid = $model->validate(); 
            if($mIsValid)  $model->save();
        }

        return $os;
    }

}
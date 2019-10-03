<?php

namespace coderius\hitCounter\config;

use coderius\hitCounter\Module;
use yii\base\BootstrapInterface;
use yii\console\Application as ConsoleApplication;
use yii\web\Application as WebApplication;
use yii\di\Instance;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $module = Module::selfInstance();

        if ($app instanceof WebApplication) {
            $module->addUrlManagerRules($app);
        } elseif ($app instanceof ConsoleApplication) {
            $module->controllerNamespace = 'coderius\hitCounter\commands';
        }

        $this->addDependencies();
    }

    private function addDependencies(){
        $container = \Yii::$container;
        
        $container->set(
            'coderius\hitCounter\components\deviceDetect\IDeviceDetect',
            'coderius\hitCounter\components\deviceDetect\DeviceDetector'
        );

        // $container->setSingleton(hitCounterService::class,
        //     ['class' => 'coderius\hitCounter\services\HitCounterService'],
        //     [],
        //     []//constructor params
        // );

        

    }

}

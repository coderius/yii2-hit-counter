<?php

namespace coderius\hitCounter\components\deviceDetect;

use  coderius\hitCounter\components\deviceDetect\IDeviceDetect;
use  yii;
use  yii\base\BaseObject;
use  yii\web\Request;
use  DeviceDetector\DeviceDetector as DD;
use  DeviceDetector\Parser\Device\DeviceParserAbstract;
use yii\base\Component;

class DeviceDetector extends  Component implements IDeviceDetect{

    private $detector;

    public function __construct($config = [])
    {
        $userAgent = Yii::$app->request->getUserAgent();
        $this->detector = new DD($userAgent);
        $this->detector->parse();
        parent::__construct($config);
        
    }

    public function getOs($attr = '')
    {
        return $this->detector->getOs();
    }


    public function getClient($attr = '')
    {
        return $this->getClient($attr = '');
    }

    public function getDevice()
    {
        return $this->getDevice();
    }

    public function getBrand()
    {
        return $this->getBrand();
    }

    public function getModel()
    {
        return $this->getModel();
    }

    public function getUserAgent()
    {
        return $this->getUserAgent();
    }

    public function getBot()
    {
        return $this->getBot();
    }

    
}    
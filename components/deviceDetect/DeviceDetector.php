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

    public function __construct(Request $request, $config = [])
    {
        $userAgent = $request->getUserAgent();
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
        return $this->detector->getClient($attr = '');
    }

    public function getDevice()
    {
        return $this->detector->getDevice();
    }

    public function getDeviceName()
    {
        return $this->detector->getDeviceName();
    }

    public function getBrand()
    {
        return $this->detector->getBrand();
    }

    public function getBrandName()
    {
        return $this->detector->getBrandName();
    }
    
    public function getModel()
    {
        return $this->detector->getModel();
    }

    public function getUserAgent()
    {
        return $this->detector->getUserAgent();
    }

    public function getBot()
    {
        return $this->detector->getBot();
    }

    
}    
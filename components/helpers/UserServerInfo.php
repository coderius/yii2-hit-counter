<?php

namespace coderius\hitCounter\components\helpers;

use  yii\base\BaseObject;

class UserServerInfo extends  BaseObject{

    private $serverData;


    public function __construct($serverData, $config = [])
    {
        $this->setServerData($serverData);
        parent::__construct($config);
    }
    

    public function getInfo()
    {
        return $this->getServerData();
    }

    /**
     * Get the value of serverData
     */ 
    public function getServerData()
    {
        return $this->serverData;
    }

    /**
     * Set the value of serverData
     *
     * @return  self
     */ 
    public function setServerData($serverData)
    {
        $this->serverData = $serverData;

        return $this;
    }
}
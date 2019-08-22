<?php

namespace coderius\hitCounter\services;

use yii\base\Component;
use coderius\hitCounter\components\helpers\UserClientInfo;
use coderius\hitCounter\components\helpers\UserServerInfo;

class HitCounterService extends Component{

    private $clientData;
    private $serverData;

    public function saveCounter()
    {
        $clientData = $this->getClientData();
        $serverData = $this->getServerData();
        
        $userClientInfo = new UserClientInfo();
        
        $userServerInfo = \Yii::createObject([
            'class' => UserServerInfo::className(),
            
        ], [$serverData]);

        return $userServerInfo->info;
    }

    /**
     * Get the value of clientData
     */ 
    public function getClientData()
    {
        return $this->clientData;
    }

    /**
     * Set the value of clientData
     *
     * @return  self
     */ 
    public function setClientData($clientData)
    {
        $this->clientData = $clientData;

        return $this;
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
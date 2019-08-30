<?php 

namespace coderius\hitCounter\components\deviceDetect;

interface IDeviceDetect{
    
    public function getOs();

    public function getClient();

    public function getDevice();

    public function getBrand();

    public function getModel();

    public function getUserAgent();

    public function getBot();
}
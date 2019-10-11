<?php

namespace coderius\hitCounter\traits;

trait RequestTrait{

    public function isProxyVisit() {
        if (@fsockopen($_SERVER['REMOTE_ADDR'], 80, $errstr, $errno, 1)) {
            return true;
        }
        return false;
    }


    public function getHostByAddr()
    {
        $remoteAddr = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
        return $remoteAddr ? gethostbyaddr($remoteAddr) : $remoteAddr;
    }
}
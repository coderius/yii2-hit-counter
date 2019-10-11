<?php

namespace coderius\hitCounter\services;

use coderius\hitCounter\models\HitCounterModel;
use coderius\hitCounter\entities\HitCounter;
use coderius\hitCounter\dto\HitDto;

/**
 * Class HitCounterAssembler
 */

final class HitCounterDtoAssembler{

    private $entityClass;
    
    public function __construct($entityClass = HitCounter::class)
    {
        if(!(new $entityClass) instanceof HitCounter){
            throw new \InvalidArgumentException($this->entityClass . 'not subclass from' . HitCounter::class);
        }
        $this->entityClass = $entityClass;
        
    }

    public function readDto(HitDto $dto): HitCounter
    {
        $hit = $this->entityClass::create(
            $dto->getCounterId(),
            $dto->getCookieMark(),
            $dto->getJsCookeiEnabled(),
            $dto->getJsJavaEnabled(),
            $dto->getJsTimezoneOffset(),
            $dto->getJsTimezone(),
            $dto->getJsConnection(),
            $dto->getJsCurrentUrl(),
            $dto->getJsRefererUrl(),
            $dto->getJsScreenWidth(),
            $dto->getJsScreenHeight(),
            $dto->getJsColorDepth(),
            $dto->getJsBrowserLanguage(),
            $dto->getJsHistoryLength(),
            $dto->getJsIsToutchDevice(),
            $dto->getJsProcessorRam(),
            $dto->getServIp(),
            $dto->getServUserAgent(),
            $dto->getServRefererUrl(),
            $dto->getServServerName(),
            $dto->getServAuthUserId(),
            $dto->getServPort(),
            $dto->getServCookies(),
            $dto->getServOs(),
            $dto->getServClient(),
            $dto->getServDevice(),
            $dto->getServBrand(),
            $dto->getServModel(),
            $dto->getServBot(),
            $dto->getServHostByIp(),
            $dto->getServIsProxyOrVpn()
        );
        
        return $hit;
    }

    // public function writeDto(HitCounter $hit): HitDto
    // {
    //     // not finished
    //     return;
        
    // }

}
<?php

namespace coderius\hitCounter\services;

use coderius\hitCounter\models\HitCounterModel;
use coderius\hitCounter\entities\HitCounter;
use coderius\hitCounter\dto\HitDto;

/**
 * Class HitCounterAssembler
 */

final class HitCounterDtoAssembler{

    public function readDto(HitDto $dto, ?HitCounter $hit = null): HitCounter
    {
        if(!$hit){
            $hit = new HitCounter();
        }
        
        $hit->counter_id            = $dto->getCounterId();
        $hit->cookie_mark           = $dto->getCookieMark();
        $hit->js_cookei_enabled     = $dto->getJsCookeiEnabled();
        $hit->js_java_enabled       = $dto->getJsJavaEnabled();
        $hit->js_timezone_offset    = $dto->getJsTimezoneOffset();
        $hit->js_timezone           = $dto->getJsTimezone();
        $hit->js_connection         = $dto->getJsConnection();
        $hit->js_current_url        = $dto->getJsCurrentUrl();
        $hit->js_referer_url        = $dto->getJsRefererUrl();
        $hit->js_screen_width       = $dto->getJsScreenWidth();
        $hit->js_screen_height      = $dto->getJsScreenHeight();
        $hit->js_color_depth        = $dto->getJsColorDepth();
        $hit->js_browser_language   = $dto->getJsBrowserLanguage();
        $hit->js_history_length     = $dto->getJsHistoryLength();
        $hit->js_is_toutch_device   = $dto->getJsIsToutchDevice();
        $hit->js_processor_ram      = $dto->getJsProcessorRam();
        $hit->serv_ip               = $dto->getServIp();
        $hit->serv_user_agent       = $dto->getServUserAgent();
        $hit->serv_referer_url      = $dto->getServRefererUrl();
        $hit->serv_server_name      = $dto->getServServerName();
        $hit->serv_auth_user_id     = $dto->getServAuthUserId();
        $hit->serv_port             = $dto->getServPort();
        $hit->serv_cookies          = $dto->getServCookies();
        $hit->serv_os               = $dto->getServOs();
        $hit->serv_client           = $dto->getServClient();
        $hit->serv_device           = $dto->getServDevice();
        $hit->serv_brand            = $dto->getServBrand();
        $hit->serv_model            = $dto->getServModel();
        $hit->serv_bot              = $dto->getServBot();
        $hit->serv_host_by_ip       = $dto->getServHostByIp();
        $hit->serv_is_proxy_or_vpn  = $dto->getServIsProxyOrVpn();
        $hit->created_at            = $dto->getCreatedAt();

        return $hit;
    }

    // public function writeDto(HitCounter $hit): HitDto
    // {
    //     // not finished
    //     return;
        
    // }

}
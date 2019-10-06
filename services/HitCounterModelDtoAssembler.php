<?php

namespace coderius\hitCounter\services;

use coderius\hitCounter\models\HitCounterModel;
use coderius\hitCounter\dto\HitDto;

/**
 * Class HitCounterModelAssembler
 */

final class HitCounterModelDtoAssembler{

    /**
     * Return model with attributes loaded by dto
     *
     * @param HitDto $dto
     * @param HitCounterModel|null $model
     * @return HitCounterModel
     */
    // public function readDto(HitDto $dto, ?HitCounterModel $model = null): HitCounterModel
    // {
    //     //not finished
    //     return;
    // }

    /**
     * Return dto loaded by model attributes
     *
     * @param HitCounterModel $model
     * @return HitDto
     */
    public function writeDto(HitCounterModel $model): HitDto
    {
        return new HitDto(
            $model->counter_id,
            $model->cookie_mark,
            $model->js_cookei_enabled,
            $model->js_java_enabled,
            $model->js_timezone_offset,
            $model->js_timezone,
            $model->js_connection,
            $model->js_current_url,
            $model->js_referer_url,
            $model->js_screen_width,
            $model->js_screen_height,
            $model->js_color_depth,
            $model->js_browser_language,
            $model->js_history_length,
            $model->js_is_toutch_device,
            $model->js_processor_ram,
            $model->serv_ip,
            $model->serv_user_agent,
            $model->serv_referer_url,
            $model->serv_server_name,
            $model->serv_auth_user_id,
            $model->serv_port,
            $model->serv_cookies,
            $model->serv_os,
            $model->serv_client,
            $model->serv_device,
            $model->serv_brand,
            $model->serv_model,
            $model->serv_bot,
            $model->serv_host_by_ip,
            $model->serv_is_proxy_or_vpn
        );
    }

}
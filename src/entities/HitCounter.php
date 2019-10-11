<?php

namespace coderius\hitCounter\entities;

use Yii;
use coderius\hitCounter\Module;

/**
 * This is the model class for table "hit_counter".
 *
 * @property int $id
 * @property string $counter_id Counter id generated in widget and passed by query param in inage src
 * @property string $cookie_mark
 * @property int $js_cookei_enabled
 * @property int $js_java_enabled
 * @property int $js_timezone_offset
 * @property string $js_timezone
 * @property string $js_connection
 * @property string $js_current_url
 * @property string $js_referer_url
 * @property int $js_screen_width
 * @property int $js_screen_height
 * @property int $js_color_depth
 * @property string $js_browser_language
 * @property int $js_history_length
 * @property int $js_is_toutch_device
 * @property int $js_processor_ram
 * @property string $serv_ip User ip
 * @property string $serv_user_agent
 * @property string $serv_referer_url
 * @property string $serv_server_name
 * @property int $serv_auth_user_id User id if exists
 * @property string $serv_port
 * @property string $serv_cookies
 * @property string $serv_os
 * @property string $serv_client
 * @property string $serv_device
 * @property string $serv_brand
 * @property string $serv_model
 * @property string $serv_bot
 * @property string $serv_host_by_ip
 * @property int $serv_is_proxy_or_vpn
 * @property string $created_at
 *
 * @property User $servAuthUser
 */
class HitCounter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hit_counter';
    }


    public static function create(
        $counter_id,
        $cookie_mark,
        $js_cookei_enabled,
        $js_java_enabled,
        $js_timezone_offset,
        $js_timezone,
        $js_connection,
        $js_current_url,
        $js_referer_url,
        $js_screen_width,
        $js_screen_height,
        $js_color_depth,
        $js_browser_language,
        $js_history_length,
        $js_is_toutch_device,
        $js_processor_ram,
        $serv_ip,
        $serv_user_agent,
        $serv_referer_url,
        $serv_server_name,
        $serv_auth_user_id,
        $serv_port,
        $serv_cookies,
        $serv_os,
        $serv_client,
        $serv_device,
        $serv_brand,
        $serv_model,
        $serv_bot,
        $serv_host_by_ip,
        $serv_is_proxy_or_vpn
    ): self
    {
        $hit = new static();
        
        $hit->counter_id = $counter_id;
        $hit->cookie_mark = $cookie_mark;
        $hit->js_cookei_enabled = $js_cookei_enabled;
        $hit->js_java_enabled = $js_java_enabled;
        $hit->js_timezone_offset = $js_timezone_offset;
        $hit->js_timezone = $js_timezone;
        $hit->js_connection = $js_connection;
        $hit->js_current_url = $js_current_url;
        $hit->js_referer_url = $js_referer_url;
        $hit->js_screen_width = $js_screen_width;
        $hit->js_screen_height = $js_screen_height;
        $hit->js_color_depth = $js_color_depth;
        $hit->js_browser_language = $js_browser_language;
        $hit->js_history_length = $js_history_length;
        $hit->js_is_toutch_device = $js_is_toutch_device;
        $hit->js_processor_ram = $js_processor_ram;
        $hit->serv_ip = $serv_ip;
        $hit->serv_user_agent = $serv_user_agent;
        $hit->serv_referer_url = $serv_referer_url;
        $hit->serv_server_name = $serv_server_name;
        $hit->serv_auth_user_id = $serv_auth_user_id;
        $hit->serv_port = $serv_port;
        $hit->serv_cookies = $serv_cookies;
        $hit->serv_os = $serv_os;
        $hit->serv_client = $serv_client;
        $hit->serv_device = $serv_device;
        $hit->serv_brand = $serv_brand;
        $hit->serv_model = $serv_model;
        $hit->serv_bot = $serv_bot;
        $hit->serv_host_by_ip = $serv_host_by_ip;
        $hit->serv_is_proxy_or_vpn = $serv_is_proxy_or_vpn;
        $hit->created_at = gmdate("Y-m-d H:i:s");

        return $hit;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServAuthUser()
    {
        return $this->hasOne(Module::getInstance()->userIdentityClass, ['id' => 'serv_auth_user_id']);
    }
}

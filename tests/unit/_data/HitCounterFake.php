<?php

namespace tests\unit\_data;

use Yii;
use coderius\hitCounter\entities\HitCounter;

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
class HitCounterFake extends HitCounter
{
    public $counter_id;
    public $cookie_mark;
    public $js_cookei_enabled;
    public $js_java_enabled;
    public $js_timezone_offset;
    public $js_timezone;
    public $js_connection;
    public $js_current_url;
    public $js_referer_url;
    public $js_screen_width;
    public $js_screen_height;
    public $js_color_depth;
    public $js_browser_language;
    public $js_history_length;
    public $js_is_toutch_device;
    public $js_processor_ram;
    public $serv_ip;
    public $serv_user_agent;
    public $serv_referer_url;
    public $serv_server_name;
    public $serv_auth_user_id;
    public $serv_port;
    public $serv_cookies;
    public $serv_os;
    public $serv_client;
    public $serv_device;
    public $serv_brand;
    public $serv_model;
    public $serv_bot;
    public $serv_host_by_ip;
    public $serv_is_proxy_or_vpn;
    public $created_at;
    
    public function save($runValidation = true, $attributeNames = null)
    {
        return true;
    }

    public function attributes()
    {
        return [
            'counter_id',
            'cookie_mark',
            'js_cookei_enabled',
            'js_java_enabled',
            'js_timezone_offset',
            'js_timezone',
            'js_connection',
            'js_current_url',
            'js_referer_url',
            'js_screen_width',
            'js_screen_height',
            'js_color_depth',
            'js_browser_language',
            'js_history_length',
            'js_is_toutch_device',
            'js_processor_ram',
            'serv_ip',
            'serv_user_agent',
            'serv_referer_url',
            'serv_server_name',
            'serv_auth_user_id',
            'serv_port',
            'serv_cookies',
            'serv_os',
            'serv_client',
            'serv_device',
            'serv_brand',
            'serv_model',
            'serv_bot',
            'serv_host_by_ip',
            'created_at'
        ];
    }

}
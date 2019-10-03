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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServAuthUser()
    {
        return $this->hasOne(Module::getInstance()->userIdentityClass, ['id' => 'serv_auth_user_id']);
    }
}

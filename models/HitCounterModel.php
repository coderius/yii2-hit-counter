<?php
/**
 * HitCounterModel
 */
namespace coderius\hitCounter\models;

use Yii;
use yii\base\Model;
use coderius\hitCounter\Module;

class HitCounterModel extends Model{
    // const SCENARIO_CREATE = 'create';
    // const SCENARIO_UPDATE = 'update';

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

    // public function init()
    // {
    //     parent::init();
    //     if ($this->getScenario() === self::SCENARIO_CREATE) {
    //         $this->setAttributes([
    //             'status' => $this->status === null ? CommentEnum::STATUS_ACTIVE : $this->status,
    //         ], false);
    //     }
    // }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['counter_id'], 'required'],
            [['js_cookei_enabled', 'js_java_enabled', 'js_timezone_offset', 'js_screen_width', 'js_screen_height', 'js_color_depth', 'js_history_length', 'js_is_toutch_device', 'js_processor_ram', 'serv_auth_user_id', 'serv_is_proxy_or_vpn', 'serv_port'], 'integer'],
            [['serv_cookies','js_current_url', 'js_referer_url','serv_referer_url','serv_user_agent'], 'string'],
            [['counter_id', 'js_timezone', 'js_connection', 'js_browser_language',  'serv_server_name', 'serv_os', 'serv_client', 'serv_device', 'serv_brand', 'serv_model', 'serv_bot', 'serv_host_by_ip'], 'string', 'max' => 255],
            [['cookie_mark'], 'string', 'max' => 32],
            [['serv_ip'], 'string', 'max' => 20],
            [['serv_auth_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::getInstance()->userIdentityClass, 'targetAttribute' => ['serv_auth_user_id' => 'id']],
            [['cookie_mark', 'js_current_url', 'serv_ip', 'js_timezone_offset','js_timezone', 'js_connection','js_referer_url','js_screen_width','js_screen_height','js_color_depth','js_browser_language','js_history_length','js_processor_ram','serv_user_agent','serv_referer_url','serv_server_name','serv_auth_user_id','serv_port','serv_cookies','serv_os','serv_client','serv_device','serv_brand','serv_model','serv_bot','serv_host_by_ip'], 'default', 'value' => null],
        ];
    }
  
    // public function scenarios()
    // {
    //     $scenarios = parent::scenarios();
    //     $scenarios[self::SCENARIO_CREATE] = ['entity', 'entity_id', 'content', 'parentId', 'status', 'guest_name'];
    //     // $scenarios[self::SCENARIO_UPDATE] = ['entity', 'entity_id', 'content', 'parentId'];
    //     return $scenarios;
    // }

    
}


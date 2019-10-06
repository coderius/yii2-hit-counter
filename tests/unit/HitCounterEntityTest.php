<?php

namespace tests\unit;

use coderius\hitCounter\entities\HitCounter;
use Yii;

class HitCounterEntityTest extends \tests\TestCase{

    protected function setUp(): void
    {
        parent::setUp();

        Yii::configure(\Yii::$app, [
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'mysql:host=172.27.0.3;port=3306;dbname=test_db',
                    'username' => 'root',
                    'password' => 'root',
                    'charset' => 'utf8',
                ],
            ],
            
        ]);

    }
    
    public function testCreateEntity()
    {
        $hit = HitCounter::create(
            $counter_id = 'w0',
            $cookie_mark = 'vl3mv;ms;vszvbn3243rr<nvVjk898m',
            $js_cookei_enabled = 1,
            $js_java_enabled = 0,
            $js_timezone_offset = -120,
            $js_timezone = 'Europe/Zaporozhye',
            $js_connection = '4g',
            $js_current_url = 'http://localhost:8880/',
            $js_referer_url = 'http://localhost:8880/',
            $js_screen_width = '1366',
            $js_screen_height = '768',
            $js_color_depth = 24,
            $js_browser_language = 'ru-RU',
            $js_history_length = 1,
            $js_is_toutch_device = 0,
            $js_processor_ram = 6,
            $serv_ip = '172.27.0.1',
            $serv_user_agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/76.0.3809.100 Chrome/76.0.3809.100 Safari/537.36',
            $serv_referer_url = 'http://localhost:8880/',
            $serv_server_name = 'localhost',
            $serv_auth_user_id = 1,
            $serv_port = 8880,
            $serv_cookies = '{"_identity-user":{"name":"_identity-user","value":"[1,\"gXlG07z9bjaA3MSHOv8_KUJ1waS0vpy7\",2592000]","domain":"","expire":null,"path":"/","secure":false,"httpOnly":true,"sameSite":null},"_csrf-user":{"name":"_csrf-user","value":"leA7IPaVr92YG_Vfhqeh5_Ral4zggBBw","domain":"","expire":null,"path":"/","secure":false,"httpOnly":true,"sameSite":null},"hit-counter-service":{"name":"hit-counter-service","value":"yvJFXbF7I6H3egDd1b0BX6jT311VBigq","domain":"","expire":null,"path":"/","secure":false,"httpOnly":true,"sameSite":null}}',
            $serv_os = '{"name":"Ubuntu","short_name":"UBT","version":"","platform":"x64"}',
            $serv_client = '{"type":"browser","name":"Chromium","short_name":"CR","version":"76.0","engine":"Blink","engine_version":""}',
            $serv_device = 'desktop',
            $serv_brand = null,
            $serv_model = null,
            $serv_bot = null,
            $serv_host_by_ip = '172.27.0.1',
            $serv_is_proxy_or_vpn = 0
        );

        $this->assertEquals($counter_id, $hit->counter_id);
        $this->assertEquals($cookie_mark, $hit->cookie_mark);
        $this->assertEquals($js_cookei_enabled, $hit->js_cookei_enabled);
        $this->assertEquals($js_java_enabled, $hit->js_java_enabled);
        $this->assertEquals($js_timezone_offset, $hit->js_timezone_offset);
    }


}
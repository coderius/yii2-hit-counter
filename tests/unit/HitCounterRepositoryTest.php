<?php

/** 
* HitCounterRepositoryTest
*/

namespace tests\unit;

use coderius\hitCounter\repositories\HitCounterRepository;
use coderius\hitCounter\entities\HitCounter;


class HitCounterRepositoryTest extends \tests\TestCase
{
  
    private $hit;
    private $repo;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repo = new HitCounterRepository();

        $this->hit = $this->getMockBuilder(HitCounter::class)
            ->setMethods(['save', 'attributes'])
            ->getMock();

        // $this->hit->method('save')->willReturn(true);
        $this->hit->method('attributes')->willReturn([
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
            'serv_is_proxy_or_vp'
        ]);
    }

    public function testSaveTrowExeption()
    {
        $this->expectException(\RuntimeException::class);
        $this->hit->method('save')->willReturn(false);
        $this->repo->save($this->hit);
    }

    public function testSaveSuccess()
    {
        $this->hit->method('save')->willReturn(true);
        $this->assertNull($this->repo->save($this->hit));
    }

} 
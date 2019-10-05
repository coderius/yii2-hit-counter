<?php

namespace tests\unit;

use coderius\hitCounter\models\HitCounterModel;
use coderius\hitCounter\Module;
use Yii;

class HitCounterModelTest extends \tests\TestCase{

    private $model;

    protected function setUp(): void
    {
        parent::setUp();

        Yii::configure(\Yii::$app, [
            'components' => [
                'user' => [
                    'class' => 'yii\web\User',
                    'identityClass' => '\tests\unit\user\User',
                    'enableAutoLogin' => true,
                    'identityCookie' => [
                        'name' => '_identity-user',
                        'httpOnly' => true],
                ],
            ],
            // 'modules' => [
            //     'hitCounter' => [
            //         'class' => 'coderius\hitCounter\Module',
            //         'instance' => new Module('hitCounter')
            //     ],
                
            // ],  
        ]);

        Module::setInstance(new Module('hitCounter'));

        $this->model = new HitCounterModel();
    }

    public function testValidRequiredTrue()
    {
        $this->model->load([
            'counter_id' =>  'w0', 
            'js_current_url' => 'http://localhost', 
            'serv_ip' => "172.27.0.1", 
            'created_at' => "2019-10-05 20:44:32"
        ], '');
        
        $this->assertTrue($this->model->validate());
    }

    public function testValidRequiredFalse()
    {
        $this->model->load([
            // 'counter_id' =>  'w0', 
            'js_current_url' => 'http://localhost', 
            'serv_ip' => "172.27.0.1", 
            'created_at' => "2019-10-05 20:44:32"
        ], '');
        
        $this->assertFalse($this->model->validate());
    }

}
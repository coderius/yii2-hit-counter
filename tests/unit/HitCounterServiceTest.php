<?php
/**
 * HitCounterServiceTest
*/

namespace tests\unit;

use coderius\hitCounter\services\HitCounterService;
use coderius\hitCounter\models\HitCounterModel;
use coderius\hitCounter\entities\HitCounter;
use tests\unit\overrides\HitCounterFake;
use coderius\hitCounter\Module;
use yii\web\Request;
use yii\di\Container;
use Yii;

class HitCounterServiceTest extends \tests\TestCase
{
  
    private $service;
    // private $request;

    protected function setUp()
    {
        parent::setUp();

        Yii::configure(\Yii::$app, [
          'components' => [
            'user' => [
                'class' => 'yii\web\User',
                'identityClass' => '\tests\unit\user\User',
            ],
            /**
             * Only if allowed database
             */
            // 'db' => [
            //   'class' => 'yii\db\Connection',
            //   'dsn' => 'mysql:host=172.27.0.3;port=3306;dbname=coderius',//test_db
            //   'username' => 'root',
            //   'password' => 'root',
            //   'charset' => 'utf8',
            // ],
          ],
        ]);
        Module::setInstance(new Module('hitCounter'));

        // $this->request = $this->createMock(Request::class);  

        $dd = $this->createMock('\coderius\hitCounter\components\deviceDetect\DeviceDetector');
        $hcr = $this->createMock('coderius\hitCounter\repositories\HitCounterRepository');
        $hcr->method('save');
       
        $this->service = new HitCounterService($dd, $hcr);
    }

  public function testDefaultNameCookieMarkExpectation()
  {
    $cookieNameExpected = 'hit-counter-service';
    $cookieNameActual = HitCounterService::defaultNameCookieMark();

    $this->assertEquals($cookieNameExpected, $cookieNameActual);
  }

  public function testLoadModel()
  {
    $request = \Yii::$app->request;
    $values = ['i' => 'w0'];
    $request->setQueryParams($values);
    $model = $this->service->loadModel($request);

    $this->assertInstanceOf(HitCounterModel::class, $model);
    $this->assertEquals($values['i'], $model->counter_id);

  }

  public function testCreate()
  {
    $model = new HitCounterModel();
    $model->setAttributes(['counter_id' => 'w0']);
    $hit = $this->service->create($model, HitCounterFake::class);
    $this->assertInstanceOf(HitCounter::class, $hit);
    $this->assertEquals('w0', $hit->counter_id);
    $this->assertNull($hit->js_is_toutch_device);
    $this->assertNotNull($hit->created_at);
  }


} 

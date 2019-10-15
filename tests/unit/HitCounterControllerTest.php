<?php
/**
 * HitCounterServiceTest
*/

namespace tests\unit;

use coderius\hitCounter\services\HitCounterService;
use coderius\hitCounter\models\HitCounterModel;
use tests\functional\overrides\controllers\HitCounterController;
use yii\web\Request;
use yii\di\Container;
use yii\web\Controller;
use yii\base\Action;
use Yii;

class HitCounterControllerTest extends \tests\TestCase
{
    private $serviceMock;
    
    protected function setUp(): void
    {
        parent::setUp();

        $dd = $this->createMock('\coderius\hitCounter\components\deviceDetect\DeviceDetector');
        $hcr = $this->createMock('coderius\hitCounter\repositories\HitCounterRepository');
        $this->serviceMock = $this->getMockBuilder(HitCounterService::class)
             ->enableOriginalConstructor()
             ->setConstructorArgs([$dd, $hcr])
             ->setMethods(['create'])
             ->getMock();
        
        $container = Yii::$container;
        
        $container->set(
            HitCounterService::class,
            function ($container, $params, $config) {
                return $this->serviceMock;
            }
        );
    }

  public function testActionIndex()
  {
    
    Yii::$app->request->queryParams = [
      'i' => 'widget-some-id',
    ];
    $response = Yii::$app->runAction('hitCounter/hit-counter/index');

    $this->assertEquals("success", $response['status']);
    

  }

  public function testActionIndexEmptyGetParamsTrowExeption()
  {
    $this->expectException(\yii\web\BadRequestHttpException::class);
    $response = Yii::$app->runAction('hitCounter/hit-counter/index');
  }

  public function testActionIndexNotValidData()
  {
    Yii::$app->request->queryParams = [
      'i' => 1, //not valid in model rules.
    ];
    $response = Yii::$app->runAction('hitCounter/hit-counter/index');
    $this->assertEquals("Counter Id must be a string.", $response['counter_id'][0]);
    // var_dump($response);
  }

  public function testActionIndexCreateErrorDomainException()
  {
    // $this->expectException(\Exception::class);
    Yii::$app->request->queryParams = [
      'i' => 'widget-some-id',
    ];
    $this->serviceMock->method('create')->willThrowException(new \DomainException());
    $response = Yii::$app->runAction('hitCounter/hit-counter/index');
    $this->assertEquals("error", $response['status']);
  }


} 
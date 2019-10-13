<?php

namespace tests\unit;

use coderius\hitCounter\Module;
use coderius\hitCounter\models\HitCounterModel;
use yii\base\Model;
use Yii;

class HitCounterModuleTest extends \tests\TestCase
{
  
  public function testGetModule()
  {
    $module = \Yii::$app->getModule('hitCounter');
    $this->assertInstanceOf(Module::class, $module);
  }

  public function testCreateSelfInstanse()
  {
    $module = Module::selfInstance();
    $this->assertInstanceOf(Module::class, $module);
  }

  public function testGetDefaultModels()
  {
    $models = Module::selfInstance()->getDefaultModels();
    $this->assertNotEmpty($models);
    $firstModel = array_shift($models);
    $this->assertInstanceOf(Model::class, new $firstModel);
  }

  public function testGetModel()
  {
    $module = Module::selfInstance();
    $model = $module->model('HitCounterModel');
    $this->assertEquals(HitCounterModel::class, $model);

    $model = $module->model('HitCounterModelNotReal');
    $this->assertFalse($model);
  }

  // public function testAddUrlManagerRules()
  // {
  //   // $r = ['counter' => 'hit-counter/index'];
  //   $this->mockWebApplication(['bootstrap' => ['coderius\hitCounter\config\Bootstrap']]);
  //   Module::selfInstance()->addUrlManagerRules(Yii::$app);
  //   $rules = \yii\helpers\Url::to(['hit-counter/index']);
  //   var_dump($rules);
  // }

}
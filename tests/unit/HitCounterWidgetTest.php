<?php

namespace tests\unit;

use coderius\hitCounter\widgets\hitCounter\HitCounterWidget;
use coderius\hitCounter\config\Enum;
use yii\base\InvalidParamException;
use Yii;

class HitCounterWidgetTest extends \tests\TestCase
{
  
  public function testInitWidgetWithCounterOptions()
  {
    $config = ['class' => HitCounterWidget::class];
    $widget = Yii::createObject($config);
    $defaultCounterOptions = [
      'type' => HitCounterWidget::COUNTER_VIEW_INVISIBLE,
      'period' => Enum::PERIOD_DAY
    ];

    $counterOptions = $widget->counterOptions;

    $this->assertNotNull($counterOptions);

    sort($defaultCounterOptions);
    sort($counterOptions);

    $this->assertEquals(json_encode($defaultCounterOptions), json_encode($counterOptions));
  }

  public function testInitWidgetUnknownCounterViewType()
  {
    $this->expectException(InvalidParamException::class);
    $config = [
      'class' => HitCounterWidget::class,
      'counterOptions' => [
          'type' => 'wrong_type'
        ]
    ];
    $widget = Yii::createObject($config);   
  }

  public function testInitWidgetUnknownCounterViewPeriod()
  {
    $this->expectException(InvalidParamException::class);
    $config = [
      'class' => HitCounterWidget::class,
      'counterOptions' => [
          'period' => 'wrong_period'
        ]
    ];
    $widget = Yii::createObject($config);   
  }

}
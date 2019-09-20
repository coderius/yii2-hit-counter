<?php

namespace tests\functional;

use coderius\hitCounter\widgets\hitCounter\HitCounterWidget;

class HitCounterWidgetTest extends \tests\TestCase
{
  
  public function setUp(): void
  {
      parent::setUp();
      $this->mockWebApplication();
      $_SERVER['REQUEST_URI'] = 'http://example.com/';

  }

  public function testRenderWidget()
  {
    $expected = file_get_contents(__DIR__ . '/data/test-counter-html.bin');  
    $out = \coderius\hitCounter\widgets\hitCounter\HitCounterWidget::widget([]);
    $this->assertEqualsWithoutLE($expected, $out);
  }

  

}    
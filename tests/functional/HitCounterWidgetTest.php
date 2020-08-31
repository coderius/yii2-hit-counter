<?php

namespace tests\functional;

use Yii;
use coderius\hitCounter\widgets\hitCounter\HitCounterWidget;

class HitCounterWidgetTest extends \tests\TestCase
{
  
  public function setUp()
  {
      parent::setUp();
      $this->mockWebApplication();
      $_SERVER['REQUEST_URI'] = 'http://example.com/';

  }

  public function testRenderWidget()
  {
    $expected = file_get_contents(__DIR__ . '/_data/test-counter-html.bin');  
    $out = \coderius\hitCounter\widgets\hitCounter\HitCounterWidget::widget([
      'counterId' => 'test-counter'
    ]);
    $this->assertEqualsWithoutLE($expected, $out);
  }

  public function testRenderWidgetAndWrapByLink()
  {
    $url = 'http://localhost';
    $expected = file_get_contents(__DIR__ . '/_data/test-counter-html-wrappedby-link.bin'); 

    $out = \coderius\hitCounter\widgets\hitCounter\HitCounterWidget::widget([
      'linkUrl' => $url,
      'counterId' => 'test-counter'
    ]);
    $this->assertEqualsWithoutLE($expected, $out);
  }


}    

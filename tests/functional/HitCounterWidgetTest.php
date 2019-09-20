<?php

namespace tests;

use coderius\hitCounter\widgets\hitCounter\HitCounterWidget;

class HitCounterWidgetTest extends TestCase
{
  protected $config = [];

  public function setUp(): void
  {
      parent::setUp();
      $this->config = [];
  }

  public function testRenderWidget()
  {
      $out = HitCounterWidget::widget($this->config);
$expected = <<<HTML
;jQuery('#post-create_time').parent().datepicker({"language":"es"});
;jQuery('#post-create_time').parent().on('changeDate', function(ev){console.log(ev);});
HTML;
      $this->assertEqualsWithoutLE($expected, $out);
  }

  public function testSomething()
  {
      // Optional: Test anything here, if you want.
      $this->assertTrue(true, 'This should already work.');

      // Stop here and mark this test as incomplete.
      $this->markTestIncomplete(
        'This test has not been implemented yet.'
      );
  }

}    
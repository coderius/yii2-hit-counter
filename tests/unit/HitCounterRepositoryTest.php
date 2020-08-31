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

    protected function setUp()
    {
        parent::setUp();

        $this->repo = new HitCounterRepository();

        $attr = require __DIR__.'/_data/HitDataArray.php';
        $attr = array_keys($attr);

        $this->hit = $this->getMockBuilder(HitCounter::class)
            ->setMethods(['save', 'attributes'])
            ->getMock();

        // $this->hit->method('save')->willReturn(true);
        $this->hit->method('attributes')->willReturn($attr);
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

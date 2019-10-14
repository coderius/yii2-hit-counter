<?php

namespace tests\functional\overrides\controllers;

class HitCounterController extends \coderius\hitCounter\controllers\HitCounterController
{
    public function behaviors()
    {
        return [];
    }
}
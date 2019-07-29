<?php
/*
 * @copyright Copyright (C) 2019 Sergio coderius <coderius>
 * @license This program is free software: the MIT License (MIT)
 */

namespace coderius\hitCounter\widgets\hitCounter;

use yii\web\AssetBundle;

/**
 * Main asset bundle.
 */
class HitCounterAsset extends AssetBundle
{
    public $sourcePath = (__DIR__ . '/assets');

    public $css = [
        
    ];

    public $js = [
        
    ];

    public $jsOptions = [
        'position' => \yii\web\View::POS_END,
    ];

    public $depends = [

    ];

    public $publishOptions = [
        'forceCopy' => true,
    ];

    public function init()
    {
        parent::init();

        //Code
    }

}

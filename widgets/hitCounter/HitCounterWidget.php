<?php
/*
 * @copyright Copyright (C) 2019 Sergio coderius <coderius>
 * @license This program is free software: the MIT License (MIT)
 */

namespace coderius\hitCounter\widgets\hitCounter;

use coderius\hitCounter\Module;
use yii\base\Widget;
use yii\helpers\Json;
use yii\web\View;

/**
 * Widget.
 */
class HitCounterWidget extends Widget
{
    private $widgetId;
    
    public function init()
    {
        parent::init();

        $this->widgetId = $this->getId();
        $this->registerAssets();
        $this->initClientOptions();
        $this->registerJs();
    }

    //?netbeanse-xdebug
    public function run()
    {
        parent::run();

        //Code
        echo "Hello world!";
    }

    /**
     * Register assets.
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        HitCounterAsset::register($view);
    }

    /**
     * Initializes the options for the Vue object.
     */
    protected function initClientOptions()
    {
        // if (!isset($this->clientOptions['el'])) {
        //     $this->clientOptions['el'] = "#{$this->widgetId}";
        //     $this->clientOptions['store'] = new \yii\web\JsExpression("store");
        //     $this->clientOptions['$'] = new \yii\web\JsExpression("jQuery");
        // }
    }

    /**
     * Register js in view.
     */
    protected function registerJs()
    {
        // VueAsset::register($this->getView());
        // $options = Json::htmlEncode($this->clientOptions);
        // $js = "var app = new Vue({$options})";
        // $this->getView()->registerJs($js, View::POS_END);
    }
}
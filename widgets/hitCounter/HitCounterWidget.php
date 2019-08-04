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
use yii\web\JsExpression;
use yii\helpers\Html;
use yii\base\InvalidParamException;
use yii\helpers\Url;

/**
 * Widget.
 */
class HitCounterWidget extends Widget
{
    const COUNTER_VIEW_INVISIBLE = 'invisible';

    public $counterType;
    
    public $linkUrl;

    private $imgSrc;

    private $clientLinkOptions = [];

    private $clientImgOptions = [];

    private $widgetId;

    private $counterName = "Hit counter";

    protected static function counterViewTypes()
    {
        retuen [
            COUNTER_VIEW_INVISIBLE
        ];
    }

    public function init()
    {
        parent::init();

        
        // Set invisible by default
        if (!isset($this->counterType)) {
            $this->counterType = self::COUNTER_VIEW_INVISIBLE;
        }else if (!array_key_exists($this->counterType, self::counterViewTypes())) {
            throw new InvalidParamException("Unknown counter view type '{$this->counterType}'.");
        }

        $this->widgetId = $this->getId();
        
        $this->initClientLinkOptions();
        $this->initClientImgOptions();
    }

    //?netbeanse-xdebug
    public function run()
    {
        parent::run();

        //Code
        $this->getView()->on(\yii\base\View::EVENT_END_PAGE, [$this, 'makeCounter']);
    }

    /**
     * Print counter code
     * 
     * @return string
     */
    protected function makeCounter()
    {
        $output = '';
        $type = $this->counterType;
        $clientImgOptions = addslashes(Html::renderTagAttributes($this->clientImgOptions));
        $output .= $this->render($type . "-counter.php", ['imgSrc' => $this->imgSrc, 'clientImgOptions' => $clientImgOptions]);
        $output .= $this->buildNoScriptHtml();
        
        $output = $this->linkUrl ? Html::a($output, $this->linkUrl, $this->clientLinkOptions) : $output;
        //Print html comments to counter output
        echo "<!-- {$this->counterName}-->" . $output . "<!-- / {$this->counterName} -->";
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function initClientImgOptions()
    {
        $this->clientImgOptions["alt"] = $this->counterName;

        switch ($this->counterType) {
            case self::COUNTER_VIEW_INVISIBLE:
            $visOpts = ["style" => "width:1px; height:1px"];
            $visOpts["style"] .= $this->linkUrl ? "" : ";position:absolute; left:-9999px;";
            $this->clientImgOptions = array_merge($this->clientImgOptions, $visOpts);
                break;
        }
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function initClientLinkOptions()
    {
        $defOpts = [];
        $defOpts['target'] = '_blank';
        if($this->counterType === self::COUNTER_VIEW_INVISIBLE) $defOpts['style'] = 'position:absolute; left:-9999px;';
        $this->clientLinkOptions = array_merge($defOpts, $this->clientLinkOptions);

    }

    /**
     * Undocumented function
     *
     * @return void
     */
    protected function buildNoScriptHtml()
    {
        
        $tag = "noscript";
        $content = Html::img($this->imgSrc, $this->clientImgOptions);
        return Html::tag($tag, $content, []);
    }

}
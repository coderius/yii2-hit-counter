<?php

namespace coderius\comments\components\behaviors;

/*
 * @package myblog
 * @file PurifyBehavior.php created 03.05.2018 10:17:46
 *
 * @copyright Copyright (C) 2018 Sergio coderius <coderius>
 * @license This program is free software: GNU General Public License
 */

use yii\base\Behavior;
use yii\db\ActiveRecord;
use yii\helpers\HtmlPurifier;

/**
 * Class PurifyBehavior.
 */
class PurifyBehavior extends Behavior
{
    /**
     * @var array attributes
     */
    public $attributes = [];
    /**
     * @var null The config to use for HtmlPurifier
     */
    public $config = null;

    /**
     * Declares event handlers for the [[owner]]'s events.
     *
     * Child classes may override this method to declare what PHP callbacks should
     * be attached to the events of the [[owner]] component.
     *
     * The callbacks will be attached to the [[owner]]'s events when the behavior is
     * attached to the owner; and they will be detached from the events when
     * the behavior is detached from the component.
     **/
    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeValidate',
        ];
    }

    /**
     * Before validate event.
     */
    public function beforeValidate()
    {
        foreach ($this->attributes as $attribute) {
            $this->owner->$attribute = HtmlPurifier::process($this->owner->$attribute, $this->config);
        }
    }
}

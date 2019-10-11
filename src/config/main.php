<?php

// var_dump(Yii::getAlias('@coderius/comments/translations'));die;
return [
    'controllerNamespace' => 'coderius\hitCounter\controllers',

    'components' => [
        'deviceDetector' => [
            'class' => 'coderius\hitCounter\components\deviceDetect\DeviceDetector'
        ]
    ],
    'params' => [
        // список параметров
    ],
];

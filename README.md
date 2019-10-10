Yii2 hit counter extention
==========================
[![Software License](https://img.shields.io/github/license/coderius/yii2-hit-counter)](LICENSE.md)
[![Code Coverage](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/?branch=master)
[![Code Quality](https://img.shields.io/scrutinizer/quality/g/coderius/yii2-hit-counter.svg?style=flat-square)](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/?branch=master)

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

First download module . Run the command in the terminal:
```
composer require "coderius/yii2-hit-counter"
```

or add in composer.json
```
"coderius/yii2-hit-counter": "^1.0"
```
and run `composer update`

Run migrations in root folder project:
```
php yii migrate/to m190926_110717_hit_counter__table --migrationPath=@coderius/hitCounter/migrations
```

## Usage

Include module in app config file. In [advanced template](https://github.com/yiisoft/yii2-app-advanced) go to `common/main.php` and set to config array next params:

```
    $conf = [
        ...
    ];
    
    $conf['modules']['hitCounter'] = [
            'class' => 'coderius\hitCounter\Module',
        ];

    $conf['bootstrap'][] = 'coderius\hitCounter\config\Bootstrap';
```

In view file past hit counter widget:
-------------------------------------

```
<?= \coderius\hitCounter\widgets\hitCounter\HitCounterWidget::widget([]); ?>
```


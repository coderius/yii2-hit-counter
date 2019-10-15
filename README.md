Yii2 hit counter extention
==========================
[![Software License](https://img.shields.io/github/license/coderius/yii2-hit-counter)](LICENSE.md)
[![Code Coverage](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Code Quality](https://img.shields.io/scrutinizer/quality/g/coderius/yii2-hit-counter.svg?style=flat-square)](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/?branch=master)
[![CodeFactor](https://img.shields.io/codefactor/grade/github/coderius/yii2-hit-counter)](https://www.codefactor.io/repository/github/coderius/yii2-hit-counter)
[![Build Status](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/badges/build.png?b=master)](https://scrutinizer-ci.com/g/coderius/yii2-hit-counter/build-status/master)


## About extention

This extension allows you to organize the collection of data about website visitors. Data is stored in a database.

**What visitor data is collected**

Javascript and php are used to get information about visitors:

By Javascript:

* Detect if client cookie enabled
* Detect if java enabled
* Detect if client has totuch device
* Timezone offset
* Type connection (like 4g etc.)
* Current url
* Referer url
* Client screen width
* Client screen height
* Client color depth
* Client browser language
* Client history length
* Client processor ram

By php:

* Visitor ip address
* Visitor user agent
* Visitor referer url
* Server name
* Auth user id
* Port
* Cookies http
* Os
* Client info
* Client device type (desctop etc.)
* Device brand
* Client device model (if detect)
* Detect is bot
* Host by ip
* Is proxy or vpn
* Date and time visit


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

## Testing

For tests neded test database and tables. 
Documentation about creating test db is at [tests/_app/README.md](tests/_app/README.md).

In order to run the tests you need to do the following:

* Set alias in terminal to phpunit:
```
alias phpunit="/var/www/html/yii2-hit-counter/vendor/bin/phpunit"
```

* Go to root folder module 'yii2-hit-counter' in terminal and run tests:
```
phpunit
```
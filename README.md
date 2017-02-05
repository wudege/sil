# sil
Single Instance Lock based Redis

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Build Status](https://travis-ci.org/wudege/sil.svg?branch=master)](https://travis-ci.org/wudege/sil)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/wudege/sil/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/wudege/sil/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/wudege/sil/badge.svg?branch=master)](https://coveralls.io/github/wudege/sil?branch=master)
[![Latest Stable Version](https://img.shields.io/packagist/v/wudege/sil.svg)](https://packagist.org/packages/wudege/sil)
[![Total Downloads](https://img.shields.io/packagist/dt/wudege/sil.svg)](https://packagist.org/packages/wudege/sil)
[![Twitter URL](https://img.shields.io/twitter/url/http/shields.io.svg?style=social&style=flat-square)](https://twitter.com/wudege)

## INSTALL

* Use the composer command or the composer.json file. That's the recommend way. And the SDK is here [`wudege/sil`][install-packagist]
```bash
$ composer require wudege/sil
```

## USAGE

```php

require __DIR__ . '/../vendor/autoload.php';

$config = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 5,
);

$client = new \Predis\Client($config);
$lock   = new \Sil\RedisSingleInstanceLock($client);
$lock->acquireLock('lock-example', sha1(uniqid(mt_rand(), true)), 3000);

```

## TEST

``` bash
$ ./vendor/bin/phpunit tests/Sil/Tests
```

## LICENSE

The MIT License (MIT). [License File](https://github.com/wudege/sil/blob/master/LICENSE).

[packagist]: http://packagist.org
[install-packagist]: https://packagist.org/packages/wudege/sil

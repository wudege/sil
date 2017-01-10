<?php
/**
 * @filename lock.php
 * @touch    10/01/2017 15:58
 * @author   Davis <daviszeng@outlook.com>
 * @version  1.0.0
 */

require __DIR__ . '/../vendor/autoload.php';

$config = array(
    'host'     => '127.0.0.1',
    'port'     => 6379,
    'database' => 5,
);

$client = new \Predis\Client($config);
$lock   = new \Sil\RedisSingleInstanceLock($client);
$res    = $lock->acquireLock('lock-example', sha1(uniqid(mt_rand(), true)), 3000);
die($res);

<?php
/**
 * @filename RedisSingleInstanceLock.php
 * @touch    10/01/2017 14:17
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace Sil;

use Predis\Client;
use Predis\Response\Status;

class RedisSingleInstanceLock implements LockInterface
{

    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     *
     * @author wudege <hi@wudege.me>
     *
     * @param $lockName
     * @param $identifier
     * @param $timeoutMilliseconds
     *
     * @return bool
     */
    public function acquireLock($lockName, $identifier, $timeoutMilliseconds)
    {
        $status = $this->client->set($lockName, $identifier, 'PX', $timeoutMilliseconds, 'NX');
        if ($status instanceof Status) {
            return $status->getPayload() === 'OK';
        }

        return false;
    }

    /**
     *
     * @author wudege <hi@wudege.me>
     *
     * @param $lockName
     * @param $identifier
     *
     * @return bool
     */
    public function releaseLock($lockName, $identifier)
    {
        $luaScript = <<<LUA
if redis.call("get",KEYS[1]) == ARGV[1] then
    return redis.call("del",KEYS[1])
else
    return 0
end
LUA;

        return $this->client->eval($luaScript, 1, $lockName, $identifier) ? true : false;
    }
}
<?php
/**
 * @filename LockInterface.php
 * @touch    10/01/2017 12:10
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace Sil;


interface LockInterface
{
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
    public function acquireLock($lockName, $identifier, $timeoutMilliseconds);

    /**
     *
     * @author wudege <hi@wudege.me>
     *
     * @param $lockName
     * @param $identifier
     *
     * @return bool
     */
    public function releaseLock($lockName, $identifier);
}
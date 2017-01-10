<?php
/**
 * @filename LockInterface.php
 * @touch    10/01/2017 12:10
 * @author   Davis <daviszeng@outlook.com>
 * @version  1.0.0
 */

namespace Sil;


interface LockInterface
{
    /**
     *
     * @author Davis <daviszeng@outlook.com>
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
     * @author Davis <daviszeng@outlook.com>
     *
     * @param $lockName
     * @param $identifier
     *
     * @return bool
     */
    public function releaseLock($lockName, $identifier);
}
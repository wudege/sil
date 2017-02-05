<?php
/**
 * @filename BaseTestCase.php
 * @touch    10/01/2017 14:55
 * @author   wudege <hi@wudege.me>
 * @version  1.0.0
 */

namespace Sil\Tests;

use Predis\Client;

abstract class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $config = array();

    /**
     * @var Client
     */
    protected $client;

    /**
     *
     * @author wudege <hi@wudege.me>
     */
    public function setUp()
    {
        $this->config = array(
            'host'     => getenv('REDIS_HOST'),
            'port'     => getenv('REDIS_PORT'),
            'database' => getenv('REDIS_DB'),
        );
        $this->client = new Client($this->config);
    }

    /**
     *
     * @author wudege <hi@wudege.me>
     */
    public function tearDown()
    {
        $this->client->disconnect();
        unset($this->client);
    }
}
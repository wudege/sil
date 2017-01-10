<?php
/**
 * @filename BaseTestCase.php
 * @touch    10/01/2017 14:55
 * @author   Davis <daviszeng@outlook.com>
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
     * @author Davis <daviszeng@outlook.com>
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
     * @author Davis <daviszeng@outlook.com>
     */
    public function tearDown()
    {
        $this->client->disconnect();
        unset($this->client);
    }
}
<?php

namespace Happyphper\LaravelBestSign\Tests;

use Exception;
use Happyphper\LaravelBestSign\Apis\StatusApi;

class ApiStatusTest extends BaseTestCase
{
    /**
     * @throws Exception
     */
    public function testApiStatus()
    {
        $res = (new StatusApi())->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('status', $res);

        $this->assertEquals('All_Service_Available', $res['status']);
    }
}

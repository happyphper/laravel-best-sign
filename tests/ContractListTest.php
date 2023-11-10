<?php

namespace Happyphper\LaravelBestSign\Tests;

use Exception;
use Happyphper\LaravelBestSign\Apis\ContractListApi;
use Happyphper\LaravelBestSign\Models\ContractListParams;

class ContractListTest extends BaseTestCase
{
    /**
     * @throws Exception
     */
    public function testList()
    {
        $params = new ContractListParams();
        $params->pageIndex = 1;
        $params->pageSize = 10;

        $res = (new ContractListApi($params))->request();

        $this->assertIsArray($res);
        $this->assertArrayHasKey('results', $res);
        $this->assertEquals($res['pageIndex'], $params->pageIndex);
        $this->assertEquals($res['pageSize'], $params->pageSize);
    }

    /**
     * @throws Exception
     */
    public function testListSearch()
    {
        $params = new ContractListParams();
        $params->sender = '陈树青';
        $params->pageIndex = 1;
        $params->pageSize = 5;

        $res = (new ContractListApi($params))->request();

        $this->assertIsArray($res);
    }
}

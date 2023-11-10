<?php

namespace Happyphper\LaravelBestSign\Tests;

use Happyphper\LaravelBestSign\Apis\TemplateListApi;

class TemplateListTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    public function testList()
    {
        $page = 1;
        $pageSize = 5;
//        $bizName = '销售合同';

        $res = (new TemplateListApi($page, $pageSize, ''))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('templates', $res);
        $this->assertArrayHasKey('currentPage', $res);
        $this->assertArrayHasKey('pageSize', $res);
        $this->assertArrayHasKey('total', $res);
        $this->assertArrayHasKey('pages', $res);
        $this->assertIsArray($res['templates']);
        $this->assertEquals($res['currentPage'], $page);
        $this->assertEquals($res['pageSize'], $pageSize);
    }
}

<?php

namespace Happyphper\LaravelBestSign\Tests;

use Happyphper\LaravelBestSign\Apis\TemplateDetailApi;
use Happyphper\LaravelBestSign\Apis\TemplateListApi;
use JetBrains\PhpStorm\NoReturn;

class TemplateDetailTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    #[NoReturn] public function testDetail()
    {
        $res = (new TemplateListApi(1, 1))->request();
        $template = $res['templates'][0];

        $res = (new TemplateDetailApi($template['templateId']))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('templateId', $res);
        $this->assertArrayHasKey('templateName', $res);
        $this->assertArrayHasKey('signOrderly', $res);
        $this->assertArrayHasKey('templateRemark', $res);
        $this->assertArrayHasKey('docGroups', $res);
        $this->assertArrayHasKey('documents', $res);

        $this->assertEquals($res['templateId'], $template['templateId']);
        $this->assertEquals($res['templateName'], $template['templateName']);
        $this->assertIsArray($res['documents']);
        $this->assertIsArray($res['roles']);
    }
}

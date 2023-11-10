<?php

namespace Happyphper\LaravelBestSign\Tests;

use Exception;
use Happyphper\LaravelBestSign\Apis\BindApi;
use Happyphper\LaravelBestSign\Apis\BindRevokeApi;
use Happyphper\LaravelBestSign\Apis\BindStatusApi;
use Happyphper\LaravelBestSign\Enums\LinkPageEnum;
use JetBrains\PhpStorm\NoReturn;

class BindTest extends BaseTestCase
{
    /**
     * @throws Exception
     */
    public function testBindStatus()
    {
        $res = (new BindStatusApi())->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('value', $res);

        $this->assertIsBool(true, $res['value']);
    }

    #[NoReturn] public function testBindForView()
    {
        try {
            $res = (new BindApi(LinkPageEnum::NO_PERMISSION_VIEW))->request();
        } catch (Exception $exception) {
            $this->assertEquals('预览时必须传递合同ID', $exception->getMessage());
        }
    }

    #[NoReturn] public function testHasBind()
    {
        $res = (new BindStatusApi())->request();
        if (!$res['value']) {
            return;
        }
        
        try {
            $res = (new BindApi(LinkPageEnum::HOME))->request();
        } catch (Exception $exception) {
            $this->assertEquals('BestSignRequest: devAccountId已与上上签账号绑定', $exception->getMessage());
        }
    }

    public function testRevoke()
    {
        $res = (new BindStatusApi())->request();
        if ($res['value']) {
            return;
        }

        // 撤销绑定
        $res = (new BindRevokeApi())->request();

        $this->assertIsArray($res);

        $this->assertEquals([], $res);
    }

    /**
     * @throws Exception
     */
    #[NoReturn] public function testFirstBind()
    {
        $res = (new BindStatusApi())->request();
        if (!$res['value']) {
            // 撤销绑定
            (new BindRevokeApi())->request();
        }

        $res = (new BindApi(LinkPageEnum::HOME))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('value', $res);
    }
}

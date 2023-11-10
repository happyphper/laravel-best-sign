<?php

namespace Happyphper\LaravelBestSign\Tests;

use Happyphper\LaravelBestSign\Apis\ContractApproveApi;
use Happyphper\LaravelBestSign\Apis\ContractSendApi;
use Happyphper\LaravelBestSign\Exceptions\ParamsException;
use Happyphper\LaravelBestSign\Tests\Common\ContractFormDemo;

class ApproveContractTest extends BaseTestCase
{
    /**
     * @throws \Exception
     */
    public function testPass()
    {
        // 发送合同
        $form = ContractFormDemo::data();
        $res = (new ContractSendApi($form))->request();
        $contractId = $res['contractId'];

        $res = (new ContractApproveApi($contractId, true))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('contractId', $res);
        $this->assertArrayHasKey('receivers', $res);
        $this->assertIsArray($res['receivers']);
    }

    /**
     * @throws ParamsException
     * @throws \Exception
     */
    public function testNoPass()
    {
        // 发送合同
        $form = ContractFormDemo::data();
        $res = (new ContractSendApi($form))->request();
        $contractId = $res['contractId'];

        $res = (new ContractApproveApi($contractId, false))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('contractId', $res);
        $this->assertArrayHasKey('receivers', $res);
        $this->assertIsArray($res['receivers']);
    }
}

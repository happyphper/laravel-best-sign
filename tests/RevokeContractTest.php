<?php

namespace Happyphper\LaravelBestSign\Tests;

use Happyphper\LaravelBestSign\Apis\ContractRevokeApi;
use Happyphper\LaravelBestSign\Apis\ContractSendApi;
use Happyphper\LaravelBestSign\Tests\Common\ContractFormDemo;

class RevokeContractTest extends BaseTestCase
{
    /**
     * 合同撤回
     *
     * @throws \Exception
     */
    public function testRevoke()
    {
        $form = ContractFormDemo::data();

        $res = (new ContractSendApi($form))->request();

        $contractId = $res['contractId'];

        $res = (new ContractRevokeApi($contractId, '测试撤回'))->request();

        $this->assertIsArray($res);

        $this->assertTrue(!$res);
    }
}

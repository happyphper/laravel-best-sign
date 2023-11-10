<?php

namespace Happyphper\LaravelBestSign\Tests;

use Exception;
use Happyphper\LaravelBestSign\Apis\ContractDetailApi;
use Happyphper\LaravelBestSign\Apis\ContractSendApi;
use Happyphper\LaravelBestSign\Tests\Common\ContractFormDemo;

class ContractDetailTest extends BaseTestCase
{
    /**
     * @throws Exception
     */
    public function testDetail()
    {
        // 发送合同
        $form = ContractFormDemo::data();
        $res = (new ContractSendApi($form))->request();
        $contractId = $res['contractId'];
//        $contractId = '3446498781296743429';

        $res = (new ContractDetailApi($contractId))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('contractId', $res);
        $this->assertArrayHasKey('contractTitle', $res);
        $this->assertArrayHasKey('templateId', $res);
        $this->assertArrayHasKey('sendTime', $res);
        $this->assertArrayHasKey('signDeadline', $res);
        $this->assertArrayHasKey('finishTime', $res);
        $this->assertArrayHasKey('status', $res);
        $this->assertArrayHasKey('sender', $res);
        $this->assertArrayHasKey('docDetails', $res);
        $this->assertArrayHasKey('signers', $res);
        $this->assertArrayHasKey('extDetailToSender', $res);

        $this->assertEquals($contractId, $res['contractId']);
    }
}

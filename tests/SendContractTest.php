<?php

namespace Happyphper\LaravelBestSign\Tests;

use Happyphper\LaravelBestSign\Apis\ContractApproveApi;
use Happyphper\LaravelBestSign\Apis\ContractSendApi;
use Happyphper\LaravelBestSign\Enums\SendActionEnum;
use Happyphper\LaravelBestSign\Exceptions\ParamsException;
use Happyphper\LaravelBestSign\Models\ContractFormData;
use Happyphper\LaravelBestSign\Models\RealNameAuth;
use Happyphper\LaravelBestSign\Models\Role;
use Happyphper\LaravelBestSign\Models\UserInfo;
use Happyphper\LaravelBestSign\Tests\Common\ContractFormDemo;

class SendContractTest extends BaseTestCase
{
    /**
     * 发送合同（待审批）
     *
     * @throws ParamsException
     * @throws \Exception
     */
    public function testSend()
    {
        $form = ContractFormDemo::data();

        $res = (new ContractSendApi($form))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('contractId', $res);
    }

    // TODO 合同撤回

    // TODO 合同预览

    // TODO 合同签署

    // TODO 合同详情

    // TODO 合同列表
}

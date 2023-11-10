<?php

namespace Happyphper\LaravelBestSign\Tests;

use Happyphper\LaravelBestSign\Apis\BindStatusApi;
use Happyphper\LaravelBestSign\Apis\ContractPreviewLinkApi;
use Happyphper\LaravelBestSign\Apis\ContractSendApi;
use Happyphper\LaravelBestSign\Tests\Common\ContractFormDemo;
use JetBrains\PhpStorm\NoReturn;

class PreviewContractTest extends BaseTestCase
{
    /**
     * 合同预览
     *
     * @throws \Exception
     */
    #[NoReturn] public function testPreview()
    {
        $res = (new BindStatusApi())->request();
        if (!$res['value']) {
            return;
        }

        $form = ContractFormDemo::data();

        $res = (new ContractSendApi($form))->request();

        $contractId = $res['contractId'];

        $res = (new ContractPreviewLinkApi($contractId))->request();

        $this->assertIsArray($res);

        $this->assertArrayHasKey('value', $res);
    }
}

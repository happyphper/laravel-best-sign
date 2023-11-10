<?php

namespace Happyphper\LaravelBestSign\Tests\Common;

use Happyphper\LaravelBestSign\Enums\SendActionEnum;
use Happyphper\LaravelBestSign\Exceptions\ParamsException;
use Happyphper\LaravelBestSign\Models\ContractFormData;
use Happyphper\LaravelBestSign\Models\RealNameAuth;
use Happyphper\LaravelBestSign\Models\Role;
use Happyphper\LaravelBestSign\Models\UserInfo;

class ContractFormDemo
{
    /**
     * @throws ParamsException
     */
    static public function data(): ContractFormData
    {
        $templateId = "3435617089719806985";

        $contractName = "测试合同" . date('YmdHis', time());

        $form = new ContractFormData($templateId, $contractName);

        // 非顺序签
        $form->setOrderly(false);

        // 甲方
        $role = new Role('3438395213599648777', new UserInfo('王大大', '11012341234'));
        $role->setRealNameAuth(new RealNameAuth());
        $form->addRole($role);

        // 模板变量
        $form->addTextLabel('buyer', '买方');
        $form->addTextLabel('seller', '卖方');
        $form->addTextLabel('甲方', '甲方');
        $form->addTextLabel('证件号', '110110199909091123');

        // 审批
        $form->setSendAction(SendActionEnum::APPROVE);

        $form->setBizNo('11012341234');

        return $form;
    }
}

<?php

namespace Happyphper\LaravelBestSign\Apis;

use Happyphper\LaravelBestSign\Enums\LinkPageEnum;

/**
 * 未审批合同预览链接
 */
class ContractPreviewLinkApi extends Base
{
    public function __construct(private string $contractId)
    {
    }

    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/users/sso-link';
    }

    public function postData(): array
    {
        return [
            'devAccountId' => $this->devAccountId(),
            'contractId' => $this->contractId,
            'targetPage' => LinkPageEnum::NO_PERMISSION_VIEW,
        ];
    }
}

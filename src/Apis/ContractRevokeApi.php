<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 合同撤回
 */
class ContractRevokeApi extends Base
{
    public function __construct(private string $contractId, private string $revokeReason = '')
    {
    }

    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return sprintf('/api/contracts/%s/revoke', $this->contractId);
    }

    public function postData(): array
    {
        return [
            'revokeReason' => $this->revokeReason,
        ];
    }
}

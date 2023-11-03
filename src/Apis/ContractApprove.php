<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 合同审批
 */
class ContractApprove extends Base
{
    public function __construct(private string $contractId, private bool $pass = true)
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
            'result' => $this->pass ? 'True' : 'False',
            'contractId' => $this->contractId,
        ];
    }
}

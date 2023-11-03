<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 驳回重签
 */
class ContractRejectResign extends Base
{
    public function __construct(private string $contractId, private string $userAccount)
    {
    }

    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return sprintf('/api/contract/%s/reject-signer-resign', $this->contractId);
    }

    public function postData(): array
    {
        return [
            'contractId' => $this->contractId,
            'userAccount' => $this->userAccount,
        ];
    }
}

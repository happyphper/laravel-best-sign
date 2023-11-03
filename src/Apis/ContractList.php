<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 合同列表
 */
class ContractList extends Base
{
    public function __construct(private string $contractStatus = '', private string $customContractId = '',)
    {
    }

    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/contract-center/search';
    }

    public function postData(): array
    {
        return [
            'contractStatus' => $this->contractStatus,
            'customContractId' => $this->customContractId,
        ];
    }
}

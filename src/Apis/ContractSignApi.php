<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 合同签署
 */
class ContractSignApi extends Base
{
    public function __construct(private array $contractIds)
    {
    }

    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/contracts/sign';
    }

    public function postData(): array
    {
        return [
            'contractIds' => $this->contractIds,
        ];
    }
}

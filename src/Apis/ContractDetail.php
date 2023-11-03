<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 合同详情
 */
class ContractDetail extends Base
{
    public function __construct(private string $contractId)
    {
    }

    public function method(): string
    {
        return 'GET';
    }

    public function path(): string
    {
        return sprintf('/api/contracts/overview/%s', $this->contractId);
    }
}

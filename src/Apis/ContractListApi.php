<?php

namespace Happyphper\LaravelBestSign\Apis;

use Happyphper\LaravelBestSign\Models\ContractListParams;

/**
 * 合同列表
 */
class ContractListApi extends Base
{
    public function __construct(private ContractListParams $params)
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
        return $this->params->toArray();
    }
}

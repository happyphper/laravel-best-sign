<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 跳转链接
 */
class Link extends Base
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
            'targetPage' => 'noPermissionView',
        ];
    }
}

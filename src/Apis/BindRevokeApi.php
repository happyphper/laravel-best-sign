<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 解除绑定
 */
class BindRevokeApi extends Base
{
    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/users/relieve-binding';
    }

    public function postData(): array
    {
        return [
            'devAccountId' => $this->devAccountId(),
        ];
    }
}

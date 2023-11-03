<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 绑定状态
 */
class BindStatus extends Base
{
    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/users/binding-existence';
    }

    public function postData(): array
    {
        return [
            'devAccountId' => $this->devAccountId(),
        ];
    }
}

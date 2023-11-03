<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 账号绑定
 */
class Bind extends Base
{
    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/users/binding-url';
    }

    public function postData(): array
    {
        return [
            'devAccountId' => $this->devAccountId(),
            'ssqAccount' => $this->bindAccount(),
            'userType' => $this->bindAccountType(),
            'targetPage' => 'home',
        ];
    }
}

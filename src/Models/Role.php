<?php

namespace Happyphper\LaravelBestSign\Models;

class Role
{
    public function __construct(private string $roleId, private UserInfo $userInfo, private string $roleName = '')
    {
    }

    public function toArray(): array
    {
        return [
            'roleId' => $this->roleId,
            'roleName' => $this->roleName,
            'userInfo' => $this->userInfo->toArray(),
        ];
    }
}

<?php

namespace Happyphper\LaravelBestSign\Models;

class UserInfo
{
    /**
     * @var string 接收人姓名
     */
    public string $userName;

    /**
     * @var string 接收人账号
     */
    public string $userAccount;

    public function __construct($userName, $userAccount)
    {
        $this->userName = $userName;
        $this->userAccount = $userAccount;
    }

    /**
     * 将对象转换为数组
     *
     * @return array 返回转换后的数组，包含用户名和用户账户
     */
    public function toArray(): array
    {
        return [
            'userName' => $this->userName,
            'userAccount' => $this->userAccount,
        ];
    }
}

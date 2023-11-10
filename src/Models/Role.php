<?php

namespace Happyphper\LaravelBestSign\Models;

use Happyphper\LaravelBestSign\Exceptions\ParamsException;

class Role
{
    /**
     * @var int 签署顺序
     */
    private int $routeOrder = 0;

    /**
     * @var RealNameAuth|null 是否实名
     */
    private ?RealNameAuth $realNameAuth = null;

    public function __construct(private string $roleId, private UserInfo $userInfo)
    {
    }

    /**
     * @throws ParamsException
     */
    public function setOrder(int $order): void
    {
        if ($order < 1) {
            throw new ParamsException('顺序编号必须大于等于 1');
        }

        $this->routeOrder = $order;
    }

    public function setRealNameAuth(RealNameAuth $realNameAuth): void
    {
        $this->realNameAuth = $realNameAuth;
    }

    public function toArray(): array
    {
        $base = [
            'roleId' => $this->roleId,
            'userInfo' => $this->userInfo->toArray(),
        ];

        $this->routeOrder && $base['routeOrder'] = $this->routeOrder;

        $this->realNameAuth && $base['realNameAuthentication'] = $this->realNameAuth->toArray();

        return $base;
    }
}

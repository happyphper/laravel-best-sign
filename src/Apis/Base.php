<?php

namespace Happyphper\LaravelBestSign\Apis;

use Happyphper\LaravelBestSign\HttpClient;
use Happyphper\LaravelBestSign\LaravelBestSign;

abstract class Base
{
    private function bs(): LaravelBestSign
    {
        return app(LaravelBestSign::class);
    }

    /**
     * 开发者账号
     *
     * @return string
     */
    protected function devAccountId(): string
    {
        return $this->bs()->devAccountId;
    }

    /**
     * 开发者账号
     *
     * @return string
     */
    protected function bindAccount(): string
    {
        return $this->bs()->bindAccount;
    }

    /**
     * 开发者账号
     *
     * @return string
     */
    protected function bindAccountType(): string
    {
        return $this->bs()->bindAccountType;
    }

    /**
     * HTTP 客户端
     *
     * @return HttpClient
     */
    protected function client(): HttpClient
    {
        return $this->bs()->client;
    }

    /**
     * 路径
     *
     * @return mixed
     */
    abstract protected function path(): string;

    /**
     * 方法
     *
     * @return mixed
     */
    protected function method(): string
    {
        return 'GET';
    }

    /**
     * POST 参数
     *
     * @return array
     */
    protected function postData(): array
    {
        return [];
    }

    /**
     * 路由参数
     *
     * @return array
     */
    protected function urlParams(): array
    {
        return [];
    }

    /**
     * 请求
     *
     * @return array
     * @throws \Exception
     */
    public function request(): array
    {
        return $this->bs()->client->request($this->path(), $this->method(), $this->postData() ?: null, $this->urlParams() ?: null);
    }
}

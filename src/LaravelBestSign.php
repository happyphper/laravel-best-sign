<?php

namespace Happyphper\LaravelBestSign;

use Illuminate\Contracts\Config\Repository;

class LaravelBestSign
{
    /**
     * @var HttpClient 客户端
     */
    public HttpClient $client;

    /**
     * 是否已绑定
     *
     * @var bool
     */
    protected bool $hasBind = false;

    /**
     * @var string 开发者账号
     */
    public string $devAccountId;

    /**
     * @var string 绑定的上上签账号
     */
    public string $bindAccount;

    /**
     * @var string 绑定的上上签账号类型
     */
    public string $bindAccountType;

    /**
     * @throws \Exception
     */
    public function __construct(Repository $repository)
    {
        $config = $repository->get('bestsign');

        // 上上签服务器地址
        // 预发布环境：https://api.bestsign.info
        // 正式环境：https://api.bestsign.cn
        if ($config['env'] == 'production') {
            // 正式环境
            $host = 'https://api.bestsign.cn';
        } else {
            // 测试环境
            $host = 'https://api.bestsign.info';
        }

        $clientId = (string)$config['client_id'];

        $clientSecret = (string)$config['client_secret'];

        $privateKey = (string)$config['private_key'];

        $this->devAccountId = (string)$config['dev_account_id'];

        $this->bindAccount = (string)$config['bind_account'];

        $this->bindAccountType = (string)$config['bind_account_type'];

        // 初始化BestSignHttpClient
        $this->client = HttpClient::getInstance($host, $clientId, $clientSecret, $privateKey);
    }
}

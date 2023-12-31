<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 环境
    |--------------------------------------------------------------------------
    |
    | production：正式环境/testing：测试环境/local：本地环境
    |
    */

    'env' => env('BEST_SIGN_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | 客户端ID
    |--------------------------------------------------------------------------
    |
    | 上上签提供
    |
    */

    'client_id' => env('BEST_SIGN_CLIENT_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | 客户端密钥
    |--------------------------------------------------------------------------
    |
    | 上上签提供
    |
    */

    'client_secret' => env('BEST_SIGN_CLIENT_SECRET', ''),

    /*
    |--------------------------------------------------------------------------
    | 私钥
    |--------------------------------------------------------------------------
    |
    | 上上签提供；形式如下，移除空格：
    | -----BEGIN RSA PRIVATE KEY-----
    | ...密钥信息
    | -----END RSA PRIVATE KEY-----
    |
    */

    'private_key' => env('BEST_SIGN_PRIVATE_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | 开发者账号
    |--------------------------------------------------------------------------
    |
    | 上上签提供
    |
    */

    'dev_account_id' => env('BEST_SIGN_DEV_ACCOUNT_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | 单点登录绑定的账号
    |--------------------------------------------------------------------------
    |
    | 上上签平台的手机号或邮箱
    |
    */

    'bind_account' => env('BEST_SIGN_BIND_ACCOUNT', ''),

    /*
    |--------------------------------------------------------------------------
    | 单点登录绑定的账号类型
    |--------------------------------------------------------------------------
    |
    | 1：个人/2:企业
    |
    */

    'bind_account_type' => env('BEST_SIGN_BIND_ACCOUNT_TYPE', '1'),
];

# 上上签 Laravel SDK

## 快速开始

```
composer require happyphper/laravel-best-sign
```

发布配置文件

```
php artisan vendor:publish --provider="Happyphper\LaravelBestSign\ServicePorvider"
```

## 配置环境变量

请根据 `bestsign.php` 配置文件进行配置

**注意：** 私钥格式如下：
```
-----BEGIN RSA PRIVATE KEY-----
密钥信息
-----END RSA PRIVATE KEY-----
```

## 接口实现

> https://apidocs.bestsign.cn/docs/apis/2388204816150036481/2389026239215042563

1. 发送合同
2. 账号绑定
3. 账号解绑
4. 合同审批
5. 合同发送
6. 合同列表
7. 合同预览链接
8. 合同驳回重签
9. 合同签署
10. API状态
11. 模板列表
12. 模板详情

具体示例，请看 `tests` 目录

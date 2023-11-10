<?php

namespace Happyphper\LaravelBestSign;

use Exception;
use Illuminate\Support\Facades\Cache;

class HttpClient
{
    /**
     * @var string $host
     */
    private string $host;

    /**
     * @var string $clientId
     */
    private string $clientId;

    /**
     * @var string $clientSecret
     */
    private string $clientSecret;

    /**
     * @var string $privateKey
     */
    private string $privateKey;

    /**
     * @var HttpClient|null 单例
     */
    private static ?HttpClient $instance = null;

    private function __construct($serverHost, $clientId, $clientSecret, $privateKey)
    {
        $this->host = $serverHost;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->privateKey = $privateKey;
    }

    /**
     * 获取实例
     *
     * @param $serverHost
     * @param $clientId
     * @param $clientSecret
     * @param $privateKey
     * @return HttpClient
     * @throws \Exception
     */
    public static function getInstance($serverHost, $clientId, $clientSecret, $privateKey): HttpClient
    {
        if (!static::$instance) {
            static::$instance = new HttpClient($serverHost, $clientId, $clientSecret, $privateKey);
            static::$instance->getToken();
        }

        return static::$instance;
    }

    /**
     * 请求
     *
     * @param $uri
     * @param $method
     * @param $postData
     * @param null $urlParams
     * @return array
     * @throws \Exception
     */
    public function request($uri, $method, $postData, $urlParams = null): array
    {
        $response = $this->handleRequest($uri, $method, $postData, $urlParams);

        return $this->handleResponse($response);
    }

    /**
     * 请求
     *
     * @throws \Exception
     */
    private function handleRequest($uri, $method, $postData, $urlParams): array
    {
        $requestUri = $this->getUri($uri, $urlParams);

        $requestUrl = $this->host . $requestUri;

        $accessToken = $this->getToken();

        $timestamp = time();

        $signature = $this->getSignature($requestUri, $postData, $timestamp);

        $headers = array();
        $headers[] = "Content-type: application/json";
        $headers[] = "bestsign-client-id: {$this->clientId}";
        $headers[] = "bestsign-sign-timestamp: {$timestamp}";
        $headers[] = "bestsign-signature-type: RSA256";
        $headers[] = "bestsign-signature: {$signature}";
        $headers[] = "Authorization: bearer {$accessToken}";

        return HttpSender::sendRequest($requestUrl, $method, $postData, $headers);
    }

    /**
     * 处理响应
     *
     * @throws \Exception
     */
    private function handleResponse(array $response): array
    {
        $code = $response['code'] ?? null;
        if (is_null($code)) {
            return $response;
        } else {
            if ($code == "0") {
                return $response['data'] ?: [];
            } else {
                throw new Exception('BestSignRequest: ' . $response['message'] ?? "BestSign request failed");
            }
        }
    }

    /**
     * 生成 URL 地址
     *
     * @param string $uri
     * @param array|null $urlParams
     * @return string
     */
    private function getUri(string $uri, array|null $urlParams = []): string
    {
        if (!$urlParams) {
            return $uri;
        }

        $s = str_starts_with($uri, '?') ? '' : '?';

        $s .= http_build_query($urlParams);

        return $uri . $s;
    }

    /**
     * 获取 Token
     *
     * @throws \Exception
     */
    private function getToken(bool $refresh = false): string
    {
        $key = 'bestsign_api_token';
        if (!$refresh && $token = Cache::get($key, '')) {
            return $token;
        }

        $path = "/api/oa2/client-credentials/token";
        $method = "POST";
        $headers = array("Content-type: application/json");

        $url = $this->host . $path;
        $postData['clientId'] = $this->clientId;
        $postData['clientSecret'] = $this->clientSecret;

        $response = HttpSender::sendRequest($url, $method, $postData, $headers);

        $response = $this->handleResponse($response);

        $token = $response['accessToken'];
        $expiresIn = $response['expiresIn'];

        Cache::set($key, $token, $expiresIn - 60);

        return $token;
    }

    /**
     * 获取签名
     *
     * @throws \Exception
     */
    private function getSignature($uri, $postData, $timestamp): string
    {
        $signature = "";

        $requestBodyMD5 = "";
        if (!empty($postData)) {
            $requestBodyMD5 = json_encode($postData);
            $requestBodyMD5 = md5($requestBodyMD5);
        } else {
            $requestBodyMD5 = md5("");
        }

        $signatureString = "bestsign-client-id={$this->clientId}" .
            "bestsign-sign-timestamp={$timestamp}" .
            "bestsign-signature-type=RSA256" .
            "request-body={$requestBodyMD5}" .
            "uri={$uri}";

        $encryptResult = openssl_sign($signatureString, $signature, $this->privateKey, OPENSSL_ALGO_SHA256);
        if (!$encryptResult) {
            throw new \Exception("Generate Signature Error!");
        }

        $signature = base64_encode($signature);

        return urlencode($signature);
    }
}

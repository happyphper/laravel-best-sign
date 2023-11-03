<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 接口检查
 */
class ApiStatus extends Base
{
    public function path(): string
    {
        return '/api/echo';
    }
}

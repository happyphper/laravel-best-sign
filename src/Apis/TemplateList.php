<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 模板列表
 */
class TemplateList extends Base
{
    public function __construct(private int $page = 1, private int $pageSize = 20)
    {
    }

    public function method(): string
    {
        return 'GET';
    }

    public function path(): string
    {
        return '/api/templates/v2';
    }
}

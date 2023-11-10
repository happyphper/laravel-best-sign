<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 模板列表
 */
class TemplateListApi extends Base
{
    public function __construct(private int $page = 1, private int $pageSize = 20, private string $bizName = '')
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

    public function urlParams(): array
    {
        return [
            'currentPage' => $this->page,
            'pageSize' => $this->pageSize,
            'bizName' => $this->bizName,
        ];
    }
}

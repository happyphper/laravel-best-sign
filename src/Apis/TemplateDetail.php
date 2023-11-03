<?php

namespace Happyphper\LaravelBestSign\Apis;

/**
 * 模板详情
 */
class TemplateDetail extends Base
{
    /**
     * @param string $id
     * @param string $queryType template-detail：整个模板； docgroup-detail ：某个文档组合；document-detail；某个文档
     */
    public function __construct(private string $id, private string $queryType = 'template-detail')
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
            'id' => $this->id,
            'queryType' => $this->queryType,
        ];
    }
}

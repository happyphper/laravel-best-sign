<?php

namespace Happyphper\LaravelBestSign\Models;

use Happyphper\LaravelBestSign\Exceptions\ParamsException;

class Sender
{
    /**
     * @throws ParamsException
     */
    public function __construct(private string $enterpriseName = '', private string $account = '', private string $bizName = '')
    {
        if ($this->enterpriseName && !$this->account) {
            throw new ParamsException('如果填写了发件方企业，则对应的发送经办人账号account则需必填');
        }
    }

    public function toArray(): array
    {
        $base = [];

        $this->enterpriseName && $base['enterpriseName'] = $this->enterpriseName;

        $this->account && $base['account'] = $this->account;

        $this->bizName && $base['bizName'] = $this->bizName;
            ;
        return $base;
    }
}

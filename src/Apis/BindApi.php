<?php

namespace Happyphper\LaravelBestSign\Apis;

use Happyphper\LaravelBestSign\Enums\LinkPageEnum;
use Mockery\Exception;

/**
 * 账号绑定
 */
class BindApi extends Base
{
    public function __construct(private string $targetPage = LinkPageEnum::HOME, private null|string $contractId = null)
    {
        if ($this->targetPage === LinkPageEnum::NO_PERMISSION_VIEW && !$this->contractId) {
            throw new Exception('预览时必须传递合同ID');
        }
    }

    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/users/binding-url';
    }

    public function postData(): array
    {
        $base = [
            'devAccountId' => $this->devAccountId(),
            'ssqAccount' => $this->bindAccount(),
            'userType' => $this->bindAccountType(),
            'targetPage' => $this->targetPage,
        ];
        if ($this->contractId) {
            $base['contractId'] = $this->contractId;
        }
        return $base;
    }
}

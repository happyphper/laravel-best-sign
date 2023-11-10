<?php

namespace Happyphper\LaravelBestSign\Apis;

use Happyphper\LaravelBestSign\Models\ContractFormData;
use Happyphper\LaravelBestSign\Models\Role;

/**
 * 合同发送
 */
class ContractSendApi extends Base
{
    public function __construct(private ContractFormData $form)
    {
    }

    public function method(): string
    {
        return 'POST';
    }

    public function path(): string
    {
        return '/api/templates/send-contracts-sync-v2';
    }

    public function postData(): array
    {
        return $this->form->toArray();
    }
}

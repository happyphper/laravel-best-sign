<?php

namespace Happyphper\LaravelBestSign\Apis;

use Happyphper\LaravelBestSign\Models\Attachment;
use Happyphper\LaravelBestSign\Models\DocumentFields;
use Happyphper\LaravelBestSign\Models\Role;

/**
 * 合同发送
 */
class ContractSend extends Base
{
    public function __construct(
        private string          $templateId,
        private string          $contractName,
        private Role            $user,
        private string          $senderAccount = '',
        private string          $sendAction = 'APPROVE',
        private array           $textLabels = [],
        private ?DocumentFields $documentFields = null,
    )
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
        $base = [
            'templateId' => $this->templateId,
            'contractName' => $this->contractName,
            'roles' => [
                $this->user->toArray(),
            ],
            'sendAction' => $this->sendAction,
        ];

        if ($this->senderAccount) {
            $base['sender'] = ['account' => $this->senderAccount];
        }

        if ($this->textLabels) {
            $base['textLabels'] = $this->textLabels;
        }

        if ($this->documentFields) {
            $base['documents'] = $this->documentFields->toArray();
        }

        return $base;
    }
}

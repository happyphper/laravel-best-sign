<?php

namespace Happyphper\LaravelBestSign\Models;

use Happyphper\LaravelBestSign\Enums\SendActionEnum;
use Happyphper\LaravelBestSign\Exceptions\ParamsException;

class ContractFormData
{
    /**
     * @var Sender|null 发件人
     */
    private ?Sender $sender = null;

    /**
     * @var array $roles 角色
     */
    private array $roles = [];
    /**
     * @var bool|null 是否顺序写
     */
    private ?bool $orderly = null;
    /**
     * @var array 模板变量
     */
    private array $textLabels = [];
    /**
     * @var string|null 自定义编号
     */
    private ?string $bizNo = null;
    /**
     * @var string|null 回调地址
     */
    private ?string $pushUrl = null;
    /**
     * @var string|null 发送
     */
    private ?string $sendAction = null;

    public function __construct(private string $templateId, private string $contractName)
    {
    }

    public function setSender(Sender $sender): void
    {
        $this->sender = $sender;
    }

    public function setOrderly(bool $orderly): void
    {
        $this->orderly = $orderly;
    }

    public function addRole(Role $role): void
    {
        $this->roles[] = $role->toArray();
    }

    public function addTextLabel(string $name, string $value): void
    {
        $this->textLabels[] = compact('name', 'value');
    }

    /**
     * @throws ParamsException
     */
    public function setSendAction(string $action): void
    {
        $c = new \ReflectionClass(SendActionEnum::class);
        $cs = $c->getConstants();
        if (!in_array($action, $cs)) {
            throw new ParamsException('类型');
        }

        $this->sendAction = $action;
    }

    public function setBizNo(string $bizNo): void
    {
        $this->bizNo = $bizNo;
    }

    public function setPushUrl(string $url): void
    {
        $this->pushUrl = $url;
    }

    public function toArray(): array
    {
        $base = [
            'templateId' => $this->templateId,
            'contractName' => $this->contractName,
        ];

        $this->sender && $base['sender'] = $this->sender->toArray();

        $this->roles && $base['roles'] = $this->roles;

        $this->orderly != null && $base['signOrderly'] = $this->orderly;

        $this->textLabels && $base['textLabels'] = $this->textLabels;

        $this->bizNo && $base['bizNo'] = $this->bizNo;

        $this->pushUrl && $base['pushUrl'] = $this->pushUrl;

        $this->sendAction && $base['sendAction'] = $this->sendAction;

        return $base;
    }
}

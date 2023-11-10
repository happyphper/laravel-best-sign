<?php

namespace Happyphper\LaravelBestSign\Models;

use Happyphper\LaravelBestSign\Exceptions\ParamsException;

class ContractListParams
{
    public ?string $sender = null;
    public ?string $signer = null;
    public ?array $contractStatus = null;
    public ?string $contractTypeName = null;
    public ?string $customContractId = null;
    public ?string $templateId = null;
    public ?int $signDeadlineStartMili = null;
    public ?int $signDeadlineEndMili = null;
    public ?int $overdueTimeStartMili = null;
    public ?int $overdueTimeEndMili = null;
    public ?int $sendTimeStartMili = null;
    public ?int $sendTimeEndMili = null;
    public ?int $finishTimeStartMili = null;
    public ?int $finishTimeEndMili = null;
    public ?int $pageIndex = null;
    public ?int $pageSize = null;
    public ?bool $equalMatchSender = null;
    public ?bool $equalMatchSigner = null;

    /**
     * @throws ParamsException
     */
    public function toArray(): array
    {
        $base = [];

        $this->sender && $base['sender'] = $this->sender;
        $this->signer && $base['signer'] = $this->signer;
        $this->contractStatus && $base['contractStatus'] = $this->contractStatus;
        $this->contractTypeName && $base['contractTypeName'] = $this->contractTypeName;
        $this->customContractId && $base['customContractId'] = $this->customContractId;
        $this->templateId && $base['templateId'] = $this->templateId;
        $this->signDeadlineStartMili && $base['signDeadlineStartMili'] = $this->signDeadlineStartMili;
        $this->signDeadlineEndMili && $base['signDeadlineEndMili'] = $this->signDeadlineEndMili;
        $this->overdueTimeStartMili && $base['overdueTimeStartMili'] = $this->overdueTimeStartMili;
        $this->overdueTimeEndMili && $base['overdueTimeEndMili'] = $this->overdueTimeEndMili;
        $this->sendTimeStartMili && $base['sendTimeStartMili'] = $this->sendTimeStartMili;
        $this->sendTimeEndMili && $base['sendTimeEndMili'] = $this->sendTimeEndMili;
        $this->finishTimeStartMili && $base['finishTimeStartMili'] = $this->finishTimeStartMili;
        $this->finishTimeEndMili && $base['finishTimeEndMili'] = $this->finishTimeEndMili;
        $this->pageIndex && $base['pageIndex'] = $this->pageIndex;
        $this->pageSize && $base['pageSize'] = $this->pageSize;
        $this->equalMatchSender && $base['equalMatchSender'] = $this->equalMatchSender;
        $this->equalMatchSigner && $base['equalMatchSigner'] = $this->equalMatchSigner;

        if (!$base) {
            throw new ParamsException('查询参数必须有一个');
        }

        return $base;
    }
}

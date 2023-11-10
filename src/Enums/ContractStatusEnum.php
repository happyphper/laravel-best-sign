<?php

namespace Happyphper\LaravelBestSign\Enums;

class ContractStatusEnum
{
    const CREATED = 'CREATED';
    const SENT = 'SENT';
    const REJECT = 'REJECT';
    const COMPLETE = 'COMPLETE';
    const REVOKE_CANCEL = 'REVOKE_CANCEL';
    const OVERDUE = 'OVERDUE';
    const IN_SEND_APPROVAL = 'IN_SEND_APPROVAL';
    const SEND_APPROVAL_NOT_PASSED = 'SEND_APPROVAL_NOT_PASSED';
    const INVALID = 'INVALID';
}

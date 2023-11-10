<?php

namespace Happyphper\LaravelBestSign\Models;

class RealNameAuth
{
    public function __construct(private bool $requireIdentityAssurance = false, private bool $requireEnterIdentityAssurance = false, private string $idNumber = '')
    {
    }

    public function toArray(): array
    {
        return [
            'requireIdentityAssurance' => $this->requireIdentityAssurance,
            'requireEnterIdentityAssurance' => $this->requireEnterIdentityAssurance,
            'idNumber' => $this->idNumber,
        ];
    }
}

<?php

namespace Happyphper\LaravelBestSign\Models;

class DocumentAttachments
{
    public function __construct(private string $documentId, private array $fields)
    {
    }

    public function toArray(): array
    {
        return [
            'documentId' => $this->documentId,
            'attachments' => [

            ],
        ];
    }
}

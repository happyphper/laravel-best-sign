<?php

namespace Happyphper\LaravelBestSign\Models;

class DocumentFields
{
    public function __construct(private string $documentId, private array $fields)
    {
    }

    public function toArray(): array
    {
        return [
            'documentId' => $this->documentId,
            'descriptionFields' => $this->fields,
        ];
    }
}

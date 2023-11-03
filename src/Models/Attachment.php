<?php

namespace Happyphper\LaravelBestSign\Models;

class Attachment
{
    public function __construct(private int $order, private string $fileName, private string $content)
    {
    }

    public function toArray(): array
    {
        return [
            'order' => $this->order,
            'fileName' => $this->fileName,
            'content' => $this->content,
        ];
    }
}

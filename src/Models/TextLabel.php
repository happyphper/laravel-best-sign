<?php

namespace Happyphper\LaravelBestSign\Models;

class TextLabel
{
    public function __construct(private string $name, private string $value)
    {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}

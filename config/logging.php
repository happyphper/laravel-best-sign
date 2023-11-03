<?php

return [
    'channels' => [
        'bestsign' => [
            'driver' => 'daily',
            'path' => storage_path('logs/bestsign.log'),
            'level' => 'debug',
            'days' => 14,
            'tap' => [],
            'replace_placeholders' => true,
            'formatter_with' => [
                'allowInlineLineBreaks' => true,
            ],
            'permission' => 0777, // 指定权限，例如 0644 表示读写权限
        ],
    ],
];

<?php

return [
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => [
        'font_dir' => storage_path('fonts/'),
        'font_cache' => storage_path('fonts/'),
        'isHtml5ParserEnabled' => true,
        'isRemoteEnabled' => true,
    ],
    'font_data' => [
        'timesnewroman' => [
            'R'  => 'TIMES.TTF',
            'B'  => 'TIMESBD.TTF',
            'I'  => 'TIMESI.TTF',
            'BI' => 'TIMESBI.TTF',
        ],
    ],
    'default_font' => 'timesnewroman',
];

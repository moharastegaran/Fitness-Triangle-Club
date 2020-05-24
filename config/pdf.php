<?php

return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'author' => '',
    'subject' => '',
    'keywords' => '',
    'creator' => 'Laravel Pdf',
    'display_mode' => 'fullpage',
    'tempDir' => base_path('../temp/'),
    'font_path' => public_path('fonts'),
    'font_data' => [
        'shabnam' => [
            'R'  => 'Shabnam.ttf',
            'B'  => 'Shabnam.ttf',
            'I'  => 'Shabnam.ttf',
            'BI' => 'Shabnam.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'bnazanin' => [
            'R'  => 'BahijNazanin-Regular.ttf',
            'B'  => 'BahijNazanin-Bold.ttf',
            'I'  => 'BahijNazanin-Regular.ttf',
            'BI' => 'BahijNazanin-Bold.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
        'times_new_roman' => [
            'R'  => 'times.ttf',
            'B'  => 'timesbd.ttf',
            'I'  => 'timesi.ttf',
            'BI' => 'timesbi.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
    ],
];

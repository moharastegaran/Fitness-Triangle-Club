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
    'font_path' => base_path('/public/fonts/'),
    'font_data' => [
        'iransans' => [
            'R'  => 'IRANSansWeb.ttf',
            'B'  => 'IRANSansWeb.ttf',
            'I'  => 'IRANSansWeb.ttf',
            'BI' => 'IRANSansWeb.ttf',
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ],
//        'bnazanin' => [
//            'R'  => 'BahijNazanin-Regular.ttf',
//            'B'  => 'BahijNazanin-Bold.ttf',
//            'I'  => 'BahijNazanin-Regular.ttf',
//            'BI' => 'BahijNazanin-Bold.ttf',
//            'useOTL' => 0xFF,
//            'useKashida' => 75,
//        ],
//        'times_new_roman' => [
//            'R'  => 'times.ttf',
//            'B'  => 'timesbd.ttf',
//            'I'  => 'timesi.ttf',
//            'BI' => 'timesbi.ttf',
//            'useOTL' => 0xFF,
//            'useKashida' => 75,
//        ],
    ],
];

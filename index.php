<?php

use src\SitemapGenerator;

require 'src\SitemapGenerator.php';

$data = [
        [
            'loc' => 'https://pyrobyte.ru/',
            'lastmod' => '2024-05-05',
            'priority' => '0.9',
            'changefreq' => 'weekly',
        ],
        [
            'loc' => 'https://pyrobyte.ru/cases',
            'lastmod' => '2024-04-03',
            'priority' => '0.5',
            'changefreq' => 'monthly',
        ],
        [
            'loc' => 'https://pyrobyte.ru/career',
            'lastmod' => '2024-02-24',
            'priority' => '0.3',
            'changefreq' => 'yearly',
        ],
        [
            'loc' => 'https://pyrobyte.ru/blog',
            'lastmod' => '2024-05-07',
            'priority' => '0.7',
            'changefreq' => 'daily',
        ],
    ];

    $directory = './upload';

    $dataTypes = [
        'xml',
        //'csv',
        //'json',
    ];

    $sitemapGenerator = new SitemapGenerator();

    foreach ($dataTypes as $dataType) {
        $sitemapGenerator->convertToDataType($data, $dataType, $directory);
    }

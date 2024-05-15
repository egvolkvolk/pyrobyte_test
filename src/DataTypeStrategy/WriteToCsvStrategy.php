<?php

namespace src\DataTypeStrategy;
require_once ('Strategy.php');

class WriteToCsvStrategy implements Strategy
{

    public function convert(array $data, string $directory)
    {
        $fileName = $directory.'/sitemap.csv';
        $fileCsv = fopen($fileName, 'w'); //exseption
        fputcsv($fileCsv, ['loc', 'lastmod', 'priority', 'changefreq'], ';');
        foreach ($data as $dataElement) {
            fputcsv($fileCsv, $dataElement, ';');
        }
        fclose($fileCsv);
        return true;
    }
}
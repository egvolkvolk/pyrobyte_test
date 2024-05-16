<?php

namespace src\DataTypeStrategy;
require_once ('Strategy.php');

class WriteToCsvStrategy implements Strategy
{

    /**
     * Conversation into .csv
     *
     * @param array $data
     * @param string $directory
     * @return true
     */
    public function convert(array $data, string $directory): bool
    {
        $fileName = $directory.'/sitemap.csv';
        $fileCsv = fopen($fileName, 'w');
        fputcsv($fileCsv, ['loc', 'lastmod', 'priority', 'changefreq'], ';'); // write headers in file
        foreach ($data as $dataElement) {
            fputcsv($fileCsv, $dataElement, ';');
        }
        fclose($fileCsv);

        return true;
    }
}
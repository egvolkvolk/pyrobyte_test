<?php

namespace src\DataTypeStrategy;
require_once ('Strategy.php');

class WriteToJsonStrategy implements Strategy
{

    /**
     * Conversation into .json
     *
     * @param array $data
     * @param string $directory
     * @return true
     */
    public function convert(array $data, string $directory): bool
    {
        $fileName = $directory.'/sitemap.json';
        $fileJson = fopen($fileName, 'w');

        $options = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES;
        $dataFormatJson = json_encode($data, $options);

        fwrite($fileJson, $dataFormatJson);
        fclose($fileJson);

        return true;
    }
}
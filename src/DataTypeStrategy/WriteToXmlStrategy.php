<?php

namespace src\DataTypeStrategy;
require_once ('Strategy.php');

use DOMDocument;

class WriteToXmlStrategy implements Strategy
{
    public function convert(array $data, string $directory): bool
    {
        $fileName = $directory.'/sitemap.xml';

        $xmlData = new DOMDocument('1.0', 'utf-8');
        $xmlData->formatOutput = true;

        $xmlUrlSet = $xmlData->createElement('urlset');
        $xmlUrlSet->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($data as $dataElement) {
           $xmlUrl = $xmlData->createElement('url');
           foreach ($dataElement as $dataElementKey => $dataElementValue) {
               $xmlUrlContent = $xmlData->createElement($dataElementKey, $dataElementValue);

               $xmlUrl->appendChild($xmlUrlContent);
           }
            $xmlUrlSet->appendChild($xmlUrl);
        }

        $xmlData->appendChild($xmlUrlSet);
        $xmlData->save($fileName);
        return true;
    }
}
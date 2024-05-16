<?php

namespace src\DataTypeStrategy;
require_once ('Strategy.php');

use DOMDocument;

class WriteToXmlStrategy implements Strategy
{
    /**
     * Conversation into .xml
     *
     * @param array $data
     * @param string $directory
     * @return bool
     * @throws \DOMException
     */
    public function convert(array $data, string $directory): bool
    {
        $fileName = $directory.'/sitemap.xml';

        $xmlData = new DOMDocument('1.0', 'utf-8'); // create DOM-document
        $xmlData->formatOutput = true;  // create automatic line break

        $xmlUrlSet = $xmlData->createElement('urlset'); // create xml header
        $xmlUrlSet->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($data as $dataElement) {
           $xmlUrl = $xmlData->createElement('url');    // create <url> path
           foreach ($dataElement as $dataElementKey => $dataElementValue) {
               $xmlUrlContent = $xmlData->createElement($dataElementKey, $dataElementValue);    // create <{key's name}> {data} </{key's name}>

               $xmlUrl->appendChild($xmlUrlContent);    // add to <url> path
           }
            $xmlUrlSet->appendChild($xmlUrl);   // add to main path
        }

        $xmlData->appendChild($xmlUrlSet);  // add to DOM-document
        $xmlData->save($fileName);

        return true;
    }
}
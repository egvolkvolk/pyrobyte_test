<?php

namespace src;
use Exception;

require_once ('Validation.php');
require_once ('DirectoryData.php');
require_once ('ChooseStrategy.php');
class SitemapGenerator
{
    /**
     * @param array $data
     * @param string $dataType
     * @param string $directory
     * @return void
     */
    public function convertToDataType(array $data, string $dataType, string $directory): void
    {
        $validation = new Validation();
        try {
            $validation->validationData($data);
            $validation->validationDataType($dataType);
            $validation->validationDirectory($directory);
        } catch (Exception $errors){
            echo $errors->getMessage();
            exit;
        }
        $this->pushToFile($data, $dataType, $directory);
    }

    private function pushToFile(array $data, string $dataType, string $directory): void
    {
        if(!file_exists($directory)){
            $directoryData = new DirectoryData();
            $directoryData->createDirectory($directory);
        }
        $currentStrategy = new ChooseStrategy();
        $currentStrategy->getStrategy($dataType)->convert($data, $directory);
    }
}
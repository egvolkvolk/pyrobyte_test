<?php
namespace src;

use Exception;

require_once ('Validation.php');
require_once ('DirectoryData.php');
require_once ('ChooseStrategy.php');

class SitemapGenerator
{
    /**
     * Validation data and call function for conversation
     *
     * @param array $data
     * @param string $dataType
     * @param string $directory
     * @return true
     */
    public function convertToDataType(array $data, string $dataType, string $directory): bool
    {
        $validation = new Validation();
        try {
            $validation->validationData($data);
            $validation->validationDataType($dataType);
            $validation->validationDirectory($directory);
        } catch (Exception $errors) {
            echo $errors->getMessage();
            exit;
        }
        $this->pushToFile($data, $dataType, $directory);

        return true;
    }

    /**
     * Checking for availability directory and choose needed strategy
     *
     * @param array $data
     * @param string $dataType
     * @param string $directory
     * @return bool
     */
    private function pushToFile(array $data, string $dataType, string $directory): bool
    {
        $directoryData = new DirectoryData();
        $directoryData->checkDirectory($directory);

        $currentStrategy = new ChooseStrategy();
        $currentStrategy->getStrategy($dataType)->convert($data, $directory);

        return true;
    }

}
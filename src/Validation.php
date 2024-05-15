<?php

namespace src;

use ChangefreqEnum;
use DataKeyEnum;
use DataTypeEnum;
use Exception;
require_once ('Data\Enum\DataKeyEnum.php');
require_once ('Data\Enum\DataTypeEnum.php');
require_once ('Data\Enum\ChangefreqEnum.php');

class Validation
{

    /**
     * @param array $data
     * @return true
     * @throws Exception
     */
    public function validationData(array $data): bool
    {
        foreach ($data as $dataElement){
                foreach ($dataElement as $dataElementKey => $dataElementValue){
                    if (!in_array($dataElementKey, array_column(DataKeyEnum::cases(), 'name'))){
                        throw new Exception("Invalid Data's key");
                    }
                    if($dataElementKey === DataKeyEnum::loc->name){
                        if(!str_contains($dataElementValue, 'https://')){ //regular
                            throw new Exception("Value 'loc' isn't a link!");
                        }
                    }
                    if($dataElementKey === DataKeyEnum::lastmod->name){
                        if(!strtotime($dataElementValue) || strlen($dataElementValue) != 10){
                            throw new Exception("Value 'lastmod' isn't a date!");
                        }
                    }
                    if($dataElementKey === DataKeyEnum::priority->name){
                        if((!is_numeric($dataElementValue)) || $dataElementValue > 1 || $dataElementValue < 0){
                              throw new Exception("Value 'priority' is incorrect!");
                           }
                        }
                    if($dataElementKey === DataKeyEnum::changefreq->name){
                        if(!in_array($dataElementValue, array_column(ChangefreqEnum::cases(), 'name'))) {
                            throw new Exception("Value 'changefreq' is incorrect!");
                        }
                    }
                }
        }

        return true;
    }


    /**
     * @param string $dataType
     * @return true
     * @throws Exception
     */
    public function validationDataType(string $dataType): bool
    {
        if(!in_array($dataType, array_column(DataTypeEnum::cases(), 'name'))){
            throw new Exception("Invalid Data's type");
        }

        return true;
    }

    /**
     * @param string $directory
     * @return true
     * @throws Exception
     */
    public function validationDirectory(string $directory): bool
    {
        if(strlen($directory) > 255){
            throw new Exception("Too big name to directory");
        }
        if(in_array($directory[0], array(' ', '-', '_'))){
            throw new Exception("Invalid directory's name");
        }

        return true;
    }
}
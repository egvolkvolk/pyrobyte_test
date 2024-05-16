<?php
namespace src;

use DataTypeEnum;
use src\DataTypeStrategy\Strategy;
use src\DataTypeStrategy\WriteToCsvStrategy;
use src\DataTypeStrategy\WriteToJsonStrategy;
use src\DataTypeStrategy\WriteToXmlStrategy;

require_once ('DataTypeStrategy\WriteToCsvStrategy.php');
require_once ('DataTypeStrategy\WriteToJsonStrategy.php');
require_once ('DataTypeStrategy\WriteToXmlStrategy.php');
require_once ('Data\Enum\DataTypeEnum.php');

class ChooseStrategy
{
    /**
     * Choose strategy for conversation
     *
     * @param string $dataType
     * @return Strategy
     */
    public function getStrategy(string $dataType): Strategy
    {
        return match($dataType) {
            DataTypeEnum::xml->name => new WriteToXmlStrategy(),
            DataTypeEnum::csv->name => new WriteToCsvStrategy(),
            DataTypeEnum::json->name => new WriteToJsonStrategy(),
        };
    }

}
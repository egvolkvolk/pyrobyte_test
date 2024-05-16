<?php

namespace src\DataTypeStrategy;

interface Strategy
{
    /**
     * Method for conversation array into needed datatype
     *
     * @param array $data
     * @param string $directory
     * @return bool
     */
    public function convert(array $data, string $directory): bool;
}
<?php

namespace src\DataTypeStrategy;

interface Strategy
{
    public function convert(array $data, string $directory);
}
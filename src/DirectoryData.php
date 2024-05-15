<?php

namespace src;

class DirectoryData
{
    public function createDirectory(string $directory) {
        mkdir($directory);

        return true;
    }
}
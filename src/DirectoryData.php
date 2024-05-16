<?php
namespace src;

class DirectoryData
{
    /**
     * Checking for a directory
     *
     * @param string $directory
     * @return bool
     */
    public function  checkDirectory(string $directory): bool
    {
        if(!file_exists($directory)){
            $this->createDirectory($directory);
        }

        return true;
    }

    /**
     * Create new directory
     *
     * @param string $directory
     * @return bool
     */
    private function createDirectory(string $directory): bool
    {
        mkdir($directory);

        return true;
    }

}
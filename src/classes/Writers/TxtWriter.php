<?php

namespace classes\Writers;

use classes\Formaters\TxtFormater;
use interfaces\WriterInterface;

class TxtWriter implements WriterInterface
{
    public function write($data)
    {
        $formater = new TxtFormater();
        $data = $formater->format($data);
        file_put_contents('./src/Log/log.txt', $data,FILE_APPEND);
    }
}
<?php

namespace classes\Writers;

use classes\Formaters\CsvFormater;
use interfaces\WriterInterface;

class CsvWriter implements WriterInterface
{
    public function write($data)
    {
        $formater = new CsvFormater();
        $data = $formater->format($data);

        if(!file_exists('./src/Log/log.csv')) {
            $csv = fopen('./src/Log/log.csv', 'w');
            fputcsv($csv,['Date', 'Level', 'Message', 'Context'],';', ' ');
        }

        $csv = fopen('./src/Log/log.csv','a');
        fputcsv($csv, $data,';',' ');

        fclose($csv);
    }
}
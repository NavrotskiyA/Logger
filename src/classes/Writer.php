<?php

namespace classes;


use interfaces\WriterInterface;

class Writer implements WriterInterface
{
    public function write($data, $logType)
    {
        if($logType == 'log'){
            $this->log($data);
        } elseif($logType == 'txt'){
            $this->txt($data);
        } else{
            $this->csv($data);
        }
    }
    private function log($data)
    {
        file_put_contents('./src/Log/log.log', $data,FILE_APPEND);
    }
    private function csv($data)
    {
        if(!file_exists('./src/Log/log.csv')) {
            $csv = fopen('./src/Log/log.csv', 'w');
        }
        $csv = fopen('./src/Log/log.csv','a');
        fputcsv($csv, $data,';',' ');
    }
    private function txt($data)
    {
        file_put_contents('./src/Log/log.txt', $data,FILE_APPEND);
    }
}
<?php

namespace classes;

use interfaces\FormatInterface;

class Format implements FormatInterface
{
    private $logString = "[level] [date] [message] [context]";
    public function format($data,$logType)
    {
        $data['date'] = date('d-m-y H:i:s');
        $imploded = '';
        foreach ($data['context'] as $key=>$val){
            if(is_string($val) || (is_object($val) && method_exists($val,'__toString'))){
                $imploded .= $val;
                $imploded .= ' | ';
            }
        }
        $data['context'] = $imploded;
        if($logType != 'csv'){
            return $this->text($data);
        } else{
            return $this->csv($data);
        }
    }
    private function csv($data): array
    {
        $data = array_values($data);
        $this->swap($data[1],$data[3]);
        $this->swap($data[2],$data[3]);
        return $data;
    }
    private function text($data): string
    {
        return strtr($this->logString,$data) . PHP_EOL;
    }
    private function swap(&$a, &$b)
    {
        $c = $a;
        $a = $b;
        $b = $c;
    }
}
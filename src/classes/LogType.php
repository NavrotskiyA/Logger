<?php

namespace classes;

use Exception;

class LogType
{
    const LOG_TYPE = array('log','csv','txt');
    private $logType;
    public function __construct($type)
    {
        if(in_array($type,self::LOG_TYPE)){
            $this->logType = $type;
            return $type;
        } else{
            throw new Exception(
                "The following type of log not supported! Please use one of this types: ".implode(', ',self::LOG_TYPE).". Thanks."  . PHP_EOL
            );
        }
    }
    public function __toString()
    {
        return $this->logType;
    }
}
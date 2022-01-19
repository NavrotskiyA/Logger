<?php
namespace classes;


use interfaces\FormaterInterface;
use interfaces\WriterInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger
{
    protected $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function log($level, $message, array $context = array())
    {
        if(!is_dir('src/Log')){
            mkdir('./src/Log');
        }

        $data = array(
            'level' => $level,
            'message' => $message,
            'context' => $context
        );

        $this->writer->write($data);
    }

}
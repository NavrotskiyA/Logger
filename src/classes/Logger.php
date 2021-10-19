<?php
namespace classes;


use interfaces\FormaterInterface;
use interfaces\WriterInterface;
use Psr\Log\AbstractLogger;

class Logger extends AbstractLogger
{
    protected $writer;
    protected $format;
    protected $logType;
    public function log($level, $message, array $context = array())
    {
        $data = array(
            'level' => $level,
            'message' => $message,
            'context' => $context
        );
        $this->writer->write($this->format->format($data,$this->logType), $this->logType);
    }
    public function __construct(WriterInterface $writer, FormaterInterface $format, string $logType)
    {
        $this->writer = $writer;
        $this->format = $format;
        $this->logType = new LogType($logType);
    }
}
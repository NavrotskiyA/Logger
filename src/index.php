<?php

require 'vendor/autoload.php';

 $writer = new \classes\Writer();
 $format = new \classes\Formater();
 $logger = new \classes\Logger($writer,$format,'log');

 $logger->log('debug','Some message for test', array("Some another info"," some array"));


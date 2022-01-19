<?php

use classes\Logger;
use classes\Writers\CsvWriter;

require 'vendor/autoload.php';
$writer = new CsvWriter();
$writer = new \classes\Writers\TxtWriter();
$writer = new \classes\Writers\DbWriter();
$log = new Logger($writer);

$log->emergency("Oh no, it's work!", ['here','we']);

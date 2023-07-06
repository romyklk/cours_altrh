<?php
require_once 'Utils/Logger.php';
require_once 'Math/Calculator.php';

use Utils\Logger;
use Math\Calculator;

$result = Calculator::add(10, 23);

Logger::log("Le résultat est : $result");
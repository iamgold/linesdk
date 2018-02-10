<?php

require __DIR__ . '/../vendor/autoload.php';
$credential = require __DIR__ . '/credential.php';


use iamgold\linesdk\Message;


extract($credential);
$message = new Message($id, $secret);
$bool = $message->oauth($result);
var_dump($bool);
var_dump($result);

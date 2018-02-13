<?php

require __DIR__ . '/../vendor/autoload.php';
$credential = require __DIR__ . '/credential.php';


use iamgold\linesdk\Message;


extract($credential);
$message = new Message($id, $secret, $accessToken);
$groupId = 'Cf3c353bff843abc8d226c55401dbcd64';
$userId = 'Uf249ae707cb2605ac04f047410b13970';

echo "\n Get user profile of specific room";
$res = $message->getGroupUserProfile($groupId, $userId);
var_dump($res);

echo "\n Leave specific room";
$res = $message->LeaveGroupById($groupId);
var_dump($res);

// only have
// echo "\n Get user ids of specific room";
// $res = $message->getRoomUsers($groupId);
// var_dump($res);




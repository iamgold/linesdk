<?php

require __DIR__ . '/../vendor/autoload.php';
$credential = require __DIR__ . '/credential.php';


use iamgold\linesdk\Message;


extract($credential);
$message = new Message($id, $secret, $accessToken);
$roomId = 'R33850bfeb84b6f5d807754daa7b61b31';
$userId = 'Uf249ae707cb2605ac04f047410b13970';

echo "\n Get user profile of specific room";
$res = $message->getRoomUserProfile($roomId, $userId);
var_dump($res);

echo "\n Leave specific room";
$res = $message->LeaveRoomById($roomId);
var_dump($res);

// only have
// echo "\n Get user ids of specific room";
// $res = $message->getRoomUsers($roomId);
// var_dump($res);




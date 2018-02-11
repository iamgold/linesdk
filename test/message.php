<?php

require __DIR__ . '/../vendor/autoload.php';
$credential = require __DIR__ . '/credential.php'; // return an array includes id, secret, accessToken, uid


use iamgold\linesdk\Message;
use iamgold\linesdk\message\{Text, Sticker, Location, Image, Audio, Video};

extract($credential);
$message = new Message($id, $secret, $accessToken);
$collector = $message->createCollector();

// test text
$text = new Text('test text');
$collector->add($text);
// $collector->push($uid);
$collector->clean();

// test sticker
$sticker = new Sticker(1, 15);
$collector->add($sticker);
// $collector->push($uid);
$collector->clean();

// test location
$location = new Location('Company', '106台北市大安區敦化南路二段76號', 25.0291593, 121.5462183);
$collector->add($location);
// $collector->push($uid);
$collector->clean();

// test image
$image = new Image('https://lineeric.adgiz.com.tw/files/sample.jpg', 'https://dummyimage.com/240x180/000/fff.jpg&text=image+test+240x180');
$collector->add($image);
// $collector->push($uid);
$collector->clean();

// test audio
$audio = new Audio('https://lineeric.adgiz.com.tw/files/sample.m4a', 14400000);
$collector->add($audio);
// $collector->push($uid);
$collector->clean();

// test audio
$video = new Video('https://lineeric.adgiz.com.tw/files/sample.mp4', 'https://dummyimage.com/240x180/000/fff.jpg&text=video+test+240x180');
$collector->add($video);
// $collector->push($uid);
$collector->clean();

//sleep(5);

$collector->addMultiple([
        $text, $sticker, $location, $image, $audio
    ]);

// $collector->getData());

$collector->push($uid);
$collector->clean();
$collector->addMultiple([
        $sticker, $location, $image, $audio, $video
    ]);
$collector->push($uid);
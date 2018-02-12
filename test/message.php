<?php

require __DIR__ . '/../vendor/autoload.php';
$credential = require __DIR__ . '/credential.php'; // return an array includes id, secret, accessToken, uid


use iamgold\linesdk\Message;
use iamgold\linesdk\message\{Text, Sticker, Location, Image, Audio, Video, ImageMap, Template, MessageAction, UriAction};

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

// test imagemap
$baseUrl = 'https://lineeric.adgiz.com.tw/photo.png';
$altText = 'This is an imagemap1';
$actions = [];
$baseSize = [];

$imageMap = new ImageMap($baseUrl, $altText, $baseSize, $actions);
$action1 = new MessageAction('message action of right', ['x'=>520, 'y'=>0, 'width'=>520, 'height'=>1040]);
$action2 = ['type'=>'uri', 'linkUri'=>'https://www.google.com.tw', 'area'=>['x'=>0, 'y'=>0, 'width'=>520, 'height'=>1040]];
$imageMap->setActions([$action1, $action2]);

$collector->add($imageMap);
// $collector->push($uid);
$collector->clean();

// test button tepmlate
$altText = 'This is a button template';
$template = [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://dummyimage.com/240x180/000/fff.jpg&text=button+tepmlate+240x180",
      "imageAspectRatio" => "rectangle",
      "imageSize" => "cover",
      "imageBackgroundColor" => "#FFFFFF",
      "title" => "Menu",
      "text" => "Please select",
      "defaultAction" => [
          "type" => "uri",
          "label" => "Google",
          "uri" => "https://www.google.com.tw"
      ],
      "actions" => [
          [
            "type" => "postback",
            "label" => "Buy",
            "data" => "action=buy&itemid=123"
          ],
          [
            "type" => "postback",
            "label" => "Add to cart",
            "data" => "action=add&itemid=123"
          ],
          [
            "type" => "uri",
            "label" => "adGeek",
            "uri" => "http://www.adgeek.com.tw"
          ]
      ]
];
$buttonTemplate = new Template($altText, $template);
$collector->add($buttonTemplate);
// $collector->push($uid);
$collector->clean();

// test confirm tepmlate
$altText = 'This is a confirm template';
$template = [
      "type" => "confirm",
      "text" => "Please select",
      "actions" => [
          [
            "type" => "postback",
            "label" => "Yes",
            "data" => "yes"
          ],
          [
            "type" => "message",
            "label" => "No",
            "text" => 'no'
          ]
      ]
];
$confirmTemplate = new Template($altText, $template);
$collector->add($confirmTemplate);
// $collector->push($uid);
$collector->clean();

// test carousel tepmlate
$altText = 'This is a carousel template';
$template = [
    "type" => "carousel",
    "columns" => [
        [
            "thumbnailImageUrl" => "https://dummyimage.com/240x180/000/fff.jpg&text=carousel+tepmlate+240x180",
            "imageBackgroundColor" => "#FFFFFF",
            "title" => "this is menu",
            "text" => "description",
            "defaultAction" => [
                "type" => "uri",
                "label" => "View detail",
                "uri" => "http://example.com/page/123"
            ],
            "actions" => [
                [
                    "type" => "postback",
                    "label" => "Buy",
                    "data" => "action=buy&itemid=111"
                ],
                [
                    "type" => "postback",
                    "label" => "Add to cart",
                    "data" => "action=add&itemid=111"
                ],
                [
                    "type" => "uri",
                    "label" => "View detail",
                    "uri" => "http://example.com/page/111"
                ]
            ]
        ],
        [
            "thumbnailImageUrl" => "https://dummyimage.com/240x180/000/fff.jpg&text=carousel+tepmlate2+240x180",
            "imageBackgroundColor" => "#FFFFFF",
            "title" => "this is menu2",
            "text" => "description2",
            "defaultAction" => [
                "type" => "uri",
                "label" => "View detail",
                "uri" => "http://example.com/page/123"
            ],
            "actions" => [
                [
                    "type" => "postback",
                    "label" => "Buy",
                    "data" => "action=buy&itemid=111"
                ],
                [
                    "type" => "postback",
                    "label" => "Add to cart",
                    "data" => "action=add&itemid=111"
                ],
                [
                    "type" => "uri",
                    "label" => "View detail",
                    "uri" => "http://example.com/page/111"
                ]
            ]
        ]
    ]
];
$carouselTemplate = new Template($altText, $template);
$collector->add($carouselTemplate);
// $collector->push($uid);
$collector->clean();

// test image carousel tepmlate
$altText = 'This is an image carousel template';
$template = [
    "type" => "image_carousel",
    "columns" => [
        [
            "imageUrl" => "https://dummyimage.com/240x180/000/fff.jpg&text=carousel+tepmlate+240x180",
            "action" => [
                "type" => "postback",
                "label" => "Buy",
                "data" => "action=buy&itemid=111"
            ]
        ],
        [
            "imageUrl" => "https://dummyimage.com/240x180/000/fff.jpg&text=carousel+tepmlate2+240x180",
            "action" => [
                "type" => "postback",
                "label" => "Buy",
                "data" => "action=buy&itemid=111"
            ]
        ],
    ]
];
$imageCarouselTemplate = new Template($altText, $template);
$collector->add($imageCarouselTemplate);
// $collector->push($uid);
$collector->clean();


// test template message
//sleep(5);

// $collector->addMultiple([
//         $text, $sticker, $location, $image, $audio
//     ]);

// $collector->push($uid);
// $collector->clean();
// $collector->addMultiple([
//         $sticker, $location, $image, $audio, $video
//     ]);
// $collector->push($uid);

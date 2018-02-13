<?php

require __DIR__ . '/../vendor/autoload.php';
$credential = require __DIR__ . '/credential.php';


use iamgold\linesdk\Message;


extract($credential);
$message = new Message($id, $secret, $accessToken);
$userId = 'Uf249ae707cb2605ac04f047410b13970';

// create richmenu
$richMenuId = null;
$menu = [
    "size" => [
        "width" => 2500,
        "height" => 1686
    ],
    "selected" => false,
    "name" => "Nice richmenu",
    "chatBarText" => "Tap to open",
    "areas" => [
        [
            "bounds" => [
                "x" => 0,
                "y" => 0,
                "width" => 2500,
                "height" => 1686
            ],
            "action" => [
                "type" => "postback",
                "data" => "action=buy&itemid=123"
            ]
        ]
    ]
];
if (!$richMenuId) {
    $res = $message->createRichMenu($menu);
    var_dump($res);
    $richMenuId = $res['richMenuId'];
}

// get rich menu list
$menus = $message->getRichMenus();
var_dump($menus);

// upload image
$image = __DIR__ . '/files/sample.jpg';
$res = $message->uploadRichMenuImage($richMenuId, $image);
var_dump($res);

// link rich menu to user
$res = $message->linkRichMenuToUser($richMenuId, $userId);
var_dump($res);

// unlink rich menu from user
$res = $message->unlinkRichMenuFromUser($userId);
var_dump($res);

// remove rich menus
while($menu=array_shift($menus['richmenus'])) {
    var_dump($menu);
    echo "\n removed " . $menu['richMenuId'];
    $message->deleteRichMenu($menu['richMenuId']);
}

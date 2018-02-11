<?php

namespace iamgold\linesdk\webhooks;

/**
 * This is a message event of video.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageStickerEvent extends Event
{
    // use message event trait
    use MessageEventTrait;

    /**
     * get package id of sticker
     *
     * @return string
     */
    public function getPackageId()
    {
        $message = $this->getMessage();
        return $message['packageId'];
    }

    /**
     * get id of sticker
     *
     * @return string
     */
    public function getStickerId()
    {
        $message = $this->getMessage();
        return $message['stickerId'];
    }
}

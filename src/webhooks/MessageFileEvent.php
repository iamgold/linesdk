<?php

namespace iamgold\linesdk\webhooks;

/**
 * This is a message event of video.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageFileEvent extends Event
{
    // use message event trait
    use MessageEventTrait;

    /**
     * get filename
     *
     * @return string
     */
    public function getFileName()
    {
        $message = $this->getMessage();
        return $message['fileName'];
    }

    /**
     * get file size
     *
     * @return string
     */
    public function getFileSize()
    {
        $message = $this->getMessage();
        return $message['fileSize'];
    }
}

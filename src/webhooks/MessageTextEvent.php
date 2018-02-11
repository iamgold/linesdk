<?php

namespace iamgold\linesdk\webhooks;

/**
 * This is a message event of text.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageTextEvent extends Event
{
    // use message event trait
    use MessageEventTrait;

    /**
     * get text
     *
     * @return string
     */
    public function getText()
    {
        $message = $this->getMessage();
        return $message['text'];
    }
}

<?php

namespace iamgold\linesdk\webhooks;

/**
 * This is a message event of location.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageLocationEvent extends Event
{
    // use message event trait
    use MessageEventTrait;

    /**
     * get title
     *
     * @return string
     */
    public function getTitle()
    {
        $message = $this->getMessage();
        return $message['title'];
    }

    /**
     * get address
     *
     * @return string
     */
    public function getAddress()
    {
        $message = $this->getMessage();
        return $message['address'];
    }

    /**
     * get latitude
     *
     * @return string
     */
    public function getLat()
    {
        $message = $this->getMessage();
        return $message['latitude'];
    }

    /**
     * get longtitude
     *
     * @return string
     */
    public function getLng()
    {
        $message = $this->getMessage();
        return $message['longitude'];
    }
}

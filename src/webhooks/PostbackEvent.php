<?php

namespace iamgold\linesdk\webhooks;

/**
 * This is a postback event class.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class PostbackEvent extends Event
{
    // use message event trait
    use MessageEventTrait;

    /**
     * get postback
     *
     * @return array
     */
    public function getPostback()
    {
        return $this->data['postback'];
    }

    /**
     * get data of postback
     *
     * @return string
     */
    public function getPostbackData()
    {
        $postback = $this->getPostback();
        return $postback['data'];
    }

    /**
     * get params of postback
     *
     * @return string
     */
    public function getPostbackParams()
    {
        $postback = $this->getPostback();
        return $postback['params'];
    }

    /**
     * get params's datetime of postback
     *
     * @return string
     */
    public function getPostbackParamsDatetime()
    {
        $params = $this->getPostbackParams();
        return $params['datetime'];
    }
}

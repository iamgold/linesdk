<?php

namespace iamgold\linesdk\message;

use iamgold\linesdk\Message;

/**
 * This is a message collector, it's used to collect all response message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Collector
{
    /**
     * @var string $data
     */
    private $data = [];

    /**
     * @var iamgold\linesdk\Message $message
     */
    private $message;

    /**
     * construct
     *
     * @param iamgold\linesdk\Message
     */
    public function __construct(Message $message = null)
    {
        $this->message = $message;
    }

    /**
     * add message
     *
     * @param iamgold\linesdk\message\DataInterface $message
     */
    public function add(DataInterface $message)
    {
        $this->data[] = $message->getData();
    }

    /**
     * add multiple messages
     * format: [iamgold\linesdk\message\DataInterface1, iamgold\linesdk\message\DataInterface2]
     *
     * @param array $messages means array of iamgold\linesdk\message\DataInterface
     */
    public function addMultiple($messages)
    {
        while($message=array_shift($messages)) {
            $this->add($message);
        }
    }

    /**
     * clean all messages
     */
    public function clean()
    {
        $this->data = [];
    }

    /**
     * reply message
     *
     * @param string $replyToken
     * @return bool
     */
    public function reply($replyToken)
    {
        return $this->message->reply($replyToken, $this->getData());
    }

    /**
     * push request
     *
     * @param mixed $to using multicast when got array
     * @return bool
     */
    public function push($to)
    {
        if (is_array($to))
            return $this->message->multicast($to, $this->getData());
        else
            return $this->message->push($to, $this->getData());
    }

    /**
     * get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}

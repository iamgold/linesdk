<?php

namespace iamgold\linesdk\webhooks;

/**
 * This trait defines many methods to access message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
trait MessageEventTrait
{

    /**
     * get reply token
     *
     * @return string
     */
    public function getReplyToken()
    {
        return $this->data['replyToken'];
    }

    /**
     * get message
     *
     * @return array
     */
    public function getMessage()
    {
        return $this->data['message'];
    }

    /**
     * get message type
     *
     * @return string
     */
    public function getMessageType()
    {
        $message = $this->getMessage();
        return $message['type'];
    }

    /**
     * get message id
     *
     * @return string
     */
    public function getMessageId()
    {
        $message = $this->getMessage();
        return $message['id'];
    }

    /**
     * check has file content
     *
     * @return bool
     */
    public function hasContentFile()
    {
        $messageType = $this->getMessageType();
        return (preg_match('/(audio|video|image|file)/', $messageType)!=false);
    }

    /**
     * get content file url
     *
     * @return string
     */
    public function getContentFileUrl()
    {
        $messageType = $this->getMessageId();
        $url = sprintf('https://api.line.me/v2/bot/message/%s/content', $messageType);

        return $url;
    }

    /**
     * get binary content. only allow message type,
     * follows: ['audio', 'video', 'image', 'file']
     *
     * @return string
     */
    public function getContent()
    {
        $contents = '';
        if ($this->hasContentFile()) {
            $contents = file_get_contents($this->getContentFileUrl());
        }

        return $contents;
    }
}

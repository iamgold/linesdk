<?php

namespace iamgold\linesdk\message;

/**
 * This is a base event class, all event classes are extending this.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Event
{
    /**
     * @var array $data
     */
    private $data;

    /**
     * construct
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->data['type'];
    }

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
     * get timestamp
     *
     * @param string $format return timestamp when null.
     * @return string
     */
    public function getTimestamp($format = null)
    {
        $value = $this->data['timestamp'];
        if (!empty($format))
            $value = date($value, $format);

        return $value;
    }

    /**
     * get source
     *
     * @return array
     */
    public function getSource()
    {
        return $this->data['source'];
    }

    /**
     * get source type
     *
     * @return string
     */
    public function getSourceType()
    {
        $source = $this->getSource();
        return $source['type'];
    }

    /**
     * get used id of source
     *
     * @return string
     */
    public function getSourceUserId()
    {
        $source = $this->getSource();
        return $source['userId'];
    }

    /**
     * get group id of source
     *
     * @return string
     */
    public function getSourceGroupId()
    {
        $source = $this->getSource();
        return $source['groupId'];
    }

    /**
     * get room id of source
     *
     * @return string
     */
    public function getSourceRoomId()
    {
        $source = $this->getSource();
        return $source['roomId'];
    }

    /**
     * check is group event
     *
     * @return bool
     */
    public function isGroupEvent()
    {
        $source = $this->getSource();
        return (isset($source['groupId']));
    }

    /**
     * check is room event
     *
     * @return bool
     */
    public function isRoomEvent()
    {
        $source = $this->getSource();
        return (isset($source['roomId']));
    }
}

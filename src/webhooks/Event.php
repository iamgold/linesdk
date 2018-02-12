<?php

namespace iamgold\linesdk\webhooks;

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
    protected $data;

    /**
     * construct
     *
     * @param array $data
     */
    public function __construct($data)
    {
        $this->data = &$data;
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
        $groupId = null;
        if ($this->isGroupEvent()) {
            $source = $this->getSource();
            $groupId = $source['groupId'];
        }

        return $groupId;
    }

    /**
     * get room id of source
     *
     * @return string
     */
    public function getSourceRoomId()
    {
        $roomId = null;
        if ($this->isRoomEvent()) {
            $source = $this->getSource();
            $roomId = $source['roomId'];
        }

        return $roomId;
    }

    /**
     * check is group event
     *
     * @return bool
     */
    public function isGroupEvent()
    {
        return ($this->getSourceType()=='group');
    }

    /**
     * check is room event
     *
     * @return bool
     */
    public function isRoomEvent()
    {
        return ($this->getSourceType()=='room');
    }
}

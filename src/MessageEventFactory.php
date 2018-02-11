<?php

namespace iamgold\linesdk;

use Exception;

/**
 * This class is used to create event, called event factory.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageEventFactory
{
    /**
     * @var array TYPES means all types of event
     */
    const TYPES = ['message', 'follow', 'unfollow', 'join', 'leave', 'postback', 'beacon'];

    /**
     * create an event by specific data
     *
     * @param array $data
     * @return iamgold\linesdk\Event
     */
    public static function create(array $data)
    {
        $type = (isset($data['type'])) ? $data['type'] : null;
        if (empty($type))
            throw new Exception("Undefined \$data[type]", 404);

        if (!in_array($type, static::TYPES))
            throw new Exception("Invalid event type $type", 400);

        if ($type==='message') {
            $messageType = $data['message']['type'];
            $className = sprintf('iamgold\linesdk\webhooks\%s%sEvent', ucfirst($type), ucfirst($messageType));
        } else {
            $className = sprintf('iamgold\linesdk\webhooks\%sEvent', ucfirst($type));
        }

        return new $className($data);
    }
}

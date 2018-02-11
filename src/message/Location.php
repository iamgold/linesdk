<?php

namespace iamgold\linesdk\message;

/**
 * This is a location message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Location extends TypeObject
{
    /**
     * construct
     *
     * @param string $text
     */
    public function __construct($title = '', $address = '', $lat = 0.0, $lng = 0.0)
    {
        $title = (string) $title;
        $address = (string) $address;
        $lat = (float) $lat;
        $lng = (float) $lng;

        $this->data = [
                'title' => trim($title),
                'address' => trim($address),
                'latitude' => $lat,
                'longitude' => $lng
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'location';
    }
}

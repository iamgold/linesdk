<?php

namespace iamgold\linesdk\message;

/**
 * This is an audio message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Audio extends TypeObject
{
    /**
     * construct
     *
     * @param string $origUrl
     * @param int $duration Length of audio file (milliseconds)
     */
    public function __construct($origUrl = '', $duration = 1000)
    {
        $this->data = [
                'originalContentUrl' => $origUrl,
                'duration' => $duration
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'audio';
    }
}

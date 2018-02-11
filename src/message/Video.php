<?php

namespace iamgold\linesdk\message;

/**
 * This is an video message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.1
 */
class Video extends TypeObject
{
    /**
     * construct
     *
     * @param string $origUrl
     * @param string $previewUrl
     */
    public function __construct($origUrl = '', $previewUrl = '')
    {
        $this->data = [
                'originalContentUrl' => $origUrl,
                'previewImageUrl' => $previewUrl
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'video';
    }
}

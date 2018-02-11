<?php

namespace iamgold\linesdk\message;

/**
 * This is an image message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Image extends TypeObject
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
        return 'image';
    }
}

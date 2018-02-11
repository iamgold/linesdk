<?php

namespace iamgold\linesdk\message;

/**
 * This is a sticker message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Sticker extends TypeObject
{
    /**
     * construct
     *
     * @param string $packageId
     * @param string $stickerId
     */
    public function __construct($packageId, $stickerId)
    {
        $this->data = [
                'packageId' => $packageId,
                'stickerId' => $stickerId
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'sticker';
    }
}

<?php

namespace iamgold\linesdk\message;

/**
 * This is a text message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class Text extends BaseMessage
{
    /**
     * construct
     *
     * @param string $text
     */
    public function __construct($text)
    {
        $text = (string) $text;
        $this->data = [
                'text' => trim($text)
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'text';
    }
}

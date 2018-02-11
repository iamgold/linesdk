<?php

namespace iamgold\linesdk\message;

/**
 * This is a action of Message.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageAction extends TypeObject
{
    /**
     * construct
     *
     * @param string $text
     * @param array $area ex: [x=>{x}, y=>{y}, width=>{width}, height=>{height}]
     */
    public function __construct($text, $area)
    {
        $text = (string) $text;
        $area = (array) $area;
        $this->data = [
                'text' => trim($text),
                'area' => $area
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'message';
    }
}

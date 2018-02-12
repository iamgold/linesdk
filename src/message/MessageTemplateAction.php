<?php

namespace iamgold\linesdk\message;

/**
 * This is a template action of Message.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class MessageTemplateAction extends TypeObject
{
    /**
     * construct
     *
     * @param string $label
     * @param string $data
     * @param string $displayText
     * @param string $text
     */
    public function __construct(string $label = '', string $text = '')
    {
        $this->data = [
                'label' => $label,
                'text' => $text
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

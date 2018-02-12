<?php

namespace iamgold\linesdk\message;

/**
 * This is a template action of Postback.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class PostbackTemplateAction extends TypeObject
{
    /**
     * construct
     *
     * @param string $label
     * @param string $data
     * @param string $displayText
     * @param string $text
     */
    public function __construct(string $label = '', string $data = '', string $displayText, string $text)
    {
        $this->data = [
                'label' => $label,
                'data' => $data,
                'displayText' => $displayText,
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
        return 'postback';
    }
}

<?php

namespace iamgold\linesdk\message;

/**
 * This is a template message
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 * @see https://developers.line.me/en/docs/messaging-api/reference/#template-messages
 */
class Template extends TypeObject
{
    /**
     * construct
     *
     * @param string $altText
     * @param array $temlate
     */
    public function __construct(string $altText = '', array $template = [])
    {
        $this->data = [
                'altText' => trim($altText),
                'template' => $template
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'template';
    }
}

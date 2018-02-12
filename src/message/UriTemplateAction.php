<?php

namespace iamgold\linesdk\message;

/**
 * This is a template action of Uri.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class UriTemplateAction extends TypeObject
{
    /**
     * construct
     *
     * @param string $label
     * @param string $uri
     */
    public function __construct(string $label = '', string $uri = '')
    {
        $this->data = [
                'label' => $label,
                'uri' => $uri
            ];
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'uri';
    }
}

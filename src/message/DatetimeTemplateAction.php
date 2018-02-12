<?php

namespace iamgold\linesdk\message;

/**
 * This is a template action of Datetime.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class DatetimeTemplateAction extends TypeObject
{
    /**
     * construct
     *
     * @param string $label
     * @param string $uri
     */
    public function __construct(string $label = '', string $data = '', string $mode = 'date', string $initial = '', string $max = '', string $min = '')
    {
        $this->data = [
                'label' => $label,
                'data' => $data,
                'mode' => $mode,
                'initial' => $initial,
                'max' => $max,
                'min' => $min
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

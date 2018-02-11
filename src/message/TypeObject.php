<?php

namespace iamgold\linesdk\message;

/**
 * This is a type object, all type messages are must extending this.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class TypeObject extends BaseObject implements DataInterface
{
    /**
     * get data
     *
     * @return array
     */
    public function getData()
    {
        $data = $this->data;
        $data['type'] = $this->getType();
        return $data;
    }

    /**
     * get type
     *
     * @return string
     */
    public function getType()
    {
        return 'unknown';
    }
}

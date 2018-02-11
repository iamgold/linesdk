<?php

namespace iamgold\linesdk\message;

/**
 * This is a base message, all messages are must extending this.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class BaseMessage implements MessageInterface
{
    /**
     * @var array $data
     */
    protected $data;

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
     * set magic method
     *
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $methodName = 'set' . ucfirst(strtolower($name));
        if (method_exists($this, $methodName)) {
            return call_user_func_array([$this, $methodName], [$value]);
        }

        if (isset($this->data[$name])) {
            $this->data[$name] = $value;
        }
    }

    /**
     * get magic method
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        $methodName = 'get' . ucfirst(strtolower($name));
        if (method_exists($this, $methodName)) {
            return call_user_func_array([$this, $methodName], [$value]);
        }

        if (isset($this->data[$name])) {
            return $this->data[$name];
        }

        return null;
    }
}

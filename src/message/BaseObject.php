<?php

namespace iamgold\linesdk\message;

/**
 * This is a base object. It provides set and get method
 * using implementing magic method.
 *
 * @author Eric Huang <iamgold0105@gmail.com>
 * @version 1.0.0
 */
class BaseObject implements DataInterface
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
        return $this->data;
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

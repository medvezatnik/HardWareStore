<?php

class Registry implements ArrayAccess
{
    private $vars = array();


    function set($key, $var)
    {
        if (isset($this->vars[$key]) == true) {
            
           throw new Exception('Невозможно определить переменную ' . $key . 'Уже задана.');
        }

        $this->vars[$key] = $var;
        return true;
    }
  
    function get($key)
    {
        if (isset($this->vars[$key]) == false) {
            return null;
        }
 
        return $this->vars[$key];

    }

    function remove($key)
    {
        unset($this->vars[$key]);
    }

    function offsetExists($offset)
    {
        return isset($this->vars[$offset]);
    }

    function offsetGet($offset)
    {
        return $this->get($offset);
    }

    function offsetSet($offset, $value)
    {
        return $this->set($offset, $value);
    }

    function offsetUnset($offset)
    {
        unset($this->vars[$offset]);
    }







}

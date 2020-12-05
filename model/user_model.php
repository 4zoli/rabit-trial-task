<?php

/**
 * @property  id
 * @property  name
 */
class user_model {

    private $id;
    private $name;
    // Constructor
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    // Return class property if exists.
    function __get($property)  {
        if (property_exists($this, $property)) {
            return $this->$property;
        } else {
            return null;
        }
    }

}
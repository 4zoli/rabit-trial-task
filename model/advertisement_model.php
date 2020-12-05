<?php


/**
 * @property  id
 * @property  userId
 * @property  title
 */
class advertisement_model {

    private $id;
    private $userId;
    private $title;
    // Constructor
    function __construct($id, $userId, $title) {
        $this->id = $id;
        $this->userId = $userId;
        $this->title = $title;
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
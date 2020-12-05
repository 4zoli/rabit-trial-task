<?php


/**
 * @property  id
 * @property  name
 */
class user_model {

    private $id;
    private $name;

    function __construct($id, $name)
            {
                $this->id = $id;
                $this->name = $name;
            }
    
            function __get($property)  {
                if (property_exists($this, $property)) {
                    return $this->$property;
                }
            }
    
        }

?>
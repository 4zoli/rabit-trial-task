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

    function __construct($id, $userId, $title)
            {
                $this->id = $id;
                $this->userId = $userId;
                $this->title = $title;
            }

            function __get($property)  {
                if (property_exists($this, $property)) {
                    return $this->$property;
                }
            }
    }

?>
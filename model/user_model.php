<?php
	
	class user_model
	{
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
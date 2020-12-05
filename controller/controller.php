<?php
    require_once 'config.php';
    require 'service/dao.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class controller
	{
        // Creates the default configs and pass them to the dao object.
 		function __construct() 
		{
			$this->objconfig = new config();
			$this->dao = new dao($this->objconfig);

		}
        // Handling requests from index.php
		public function requestHandler()
		{
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) 
			{
                case 'users' :
					$this->list_users();
					break;						
				case 'advertisements':
					$this->list_advertisements();
					break;
				default:
			}
		}

        // List users from users db.
        public function list_users(){
 		    $result = $this->dao->selectUsers();
            include "view/user_list.php";
        }

        // List advertisements from advertisements db with user names.
        public function list_advertisements(){
 		    $result = $this->dao->selectAdvertisements();
            include "view/advertisement_list.php";
        }
    }
		
	
?>
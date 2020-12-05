<?php
    require_once 'config.php';
    require 'service/dao.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

/**
 * @property config object_config
 * @property dao dao
 */
class controller {
        // Creates the default configs and pass them to the dao object.
        function __construct() {
			$this->object_config = new config();
			$this->dao = new dao($this->object_config);
		}
        // Handling requests from index.php
		public function requestHandler() {
			$act = isset($_GET['act']) ? $_GET['act'] : NULL;
			switch ($act) {
                case 'users' :
					$this->list_users();
					break;						
				case 'advertisements':
					$this->list_advertisements();
					break;
				default:
			}
		}
        // List users from users table.
        public function list_users() {
            try {
                @
                $result = $this->dao->selectUsers();
            } catch (Exception $e) {
                echo "Something went wrong";
            }
            include "view/user_list.php";
        }
        // List advertisements from advertisements table with user names.
        public function list_advertisements() {
            try {
                @
                $result = $this->dao->selectAdvertisements();
            } catch (Exception $e) {
                echo "Something went wrong";
            }
            include "view/advertisement_list.php";
        }
    }
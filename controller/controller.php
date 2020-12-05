<?php
    require 'model/advertisement_model.php';
    require 'model/user_model.php';

    require_once 'config.php';

    session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();
    
	class controller
	{

 		function __construct() 
		{          
			$this->objconfig = new config();
			$this->obj_user_model =  new usermodel($this->objconfig);
            $this->obj_adv_model =  new advertisement_model($this->objconfig);
		}
        // mvc handler request
		public function mvcHandler() 
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
        // page redirection
		public function pageRedirect($url)
		{
			header('Location:'.$url);
		}	
        // check validation
		public function checkValidation($sporttb)
        {    $noerror=true;
            // Validate category        
            if(empty($sporttb->category)){
                $sporttb->category_msg = "Field is empty.";$noerror=false;
            } elseif(!filter_var($sporttb->category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $sporttb->category_msg = "Invalid entry.";$noerror=false;
            }else{$sporttb->category_msg ="";}            
            // Validate name            
            if(empty($sporttb->name)){
                $sporttb->name_msg = "Field is empty.";$noerror=false;     
            } elseif(!filter_var($sporttb->name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
                $sporttb->name_msg = "Invalid entry.";$noerror=false;
            }else{$sporttb->name_msg ="";}
            return $noerror;
        }
        // List users from db.
        public function list_users(){
            $result=$this->obj_user_model->selectUsers(0);
            include "view/user_list.php";
        }
        // List advertisements from db.
        public function list_advertisements(){
            $result=$this->obj_adv_model->selectAdvertisements(0);
            include "view/advertisement_list.php";
        }
    }
		
	
?>
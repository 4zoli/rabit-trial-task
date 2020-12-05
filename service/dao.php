<?php

    require 'model/advertisement_model.php';

    class dao
    {
        // Set database config for mysql
        function __construct($consetup)
        {
            $this->host = $consetup->host;
            $this->user = $consetup->user;
            $this->pass = $consetup->pass;
            $this->db = $consetup->db;
        }

        // Open mysql data base connection
        public function open_db()
        {
            $this->condb = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if ($this->condb->connect_error) {
                die("Error in connection: " . $this->condb->connect_error);
            }
        }

        // Close database connection
        public function close_db()
        {
            $this->condb->close();
        }

        // Select users
        public function selectUsers()
        {
            try
            {
                $this->open_db();
                $query=$this->condb->prepare("SELECT * FROM users");
                $query->execute();
                $res=$query->get_result();
                $query->close();
                $this->close_db();
                return $res;
            }
            catch(Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }

        // Select advertisements
        public function selectAdvertisements()
        {
            try
            {
                $this->open_db();
                $query=$this->condb->prepare("SELECT * FROM advertisements");
                $query->execute();
                $res=$query->get_result();
                $query->close();
                $this->close_db();
                return $res;
            }
            catch(Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }

    }

?>
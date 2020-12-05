<?php

    require 'model/advertisement_model.php';

    class dao
    {
        // set database config for mysql
        function __construct($consetup)
        {
            $this->host = $consetup->host;
            $this->user = $consetup->user;
            $this->pass = $consetup->pass;
            $this->db = $consetup->db;
        }

        // open mysql data base
        public function open_db()
        {
            $this->condb = new mysqli($this->host, $this->user, $this->pass, $this->db);
            if ($this->condb->connect_error) {
                die("Error in connection: " . $this->condb->connect_error);
            }
        }

        // close database
        public function close_db()
        {
            $this->condb->close();
        }

        // select users
        public function selectUsers($id)
        {
            try
            {
                $this->open_db();
                if($id>0)
                {
                    $query=$this->condb->prepare("SELECT * FROM users WHERE id=?");
                    $query->bind_param("i",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM users");	}

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

        // select advertisements
        public function selectAdvertisements($id)
        {
            try
            {
                $this->open_db();
                if($id>0)
                {
                    $query=$this->condb->prepare("SELECT * FROM advertisements WHERE id=?");
                    $query->bind_param("i",$id);
                }
                else
                {$query=$this->condb->prepare("SELECT * FROM advertisements");	}

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
<?php
    require 'model/user_model.php';
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

        // Select Users
        public function selectUsers()
        {
            $users = array();

            try
            {
                $this->open_db();
                $query=$this->condb->prepare("SELECT * FROM users");
                $query->execute();
                $res=$query->get_result();

                while ($row = $res->fetch_assoc()) {
                    $users[] = new user_model($row['id'], $row['name']);
                }

                print_r($users);

                $query->close();
                $this->close_db();
                return $users;
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
            $advertisements = array();

            try
            {
                $this->open_db();
                $query=$this->condb->prepare("SELECT * FROM advertisements");
                $query->execute();
                $res=$query->get_result();

                while ($row = $res->fetch_assoc()) {
                    $advertisements[] = new advertisement_model($row['id'], $row['userId'], $row['title']);
                }

                print_r($advertisements);

                $query->close();
                $this->close_db();
                return $advertisements;
            }
            catch(Exception $e)
            {
                $this->close_db();
                throw $e;
            }
        }

    }

?>
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

        // Open mysql database connection
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

        // Select users.
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

                $query->close();

                return $users;
            }
            catch(Exception $e)
            {
                throw $e;
            }
            finally
            {
                $this->close_db();
            }
        }

        // Select advertisements with users names.
        public function selectAdvertisements()
        {
            $advertisements = array();

            try
            {
                $this->open_db();
                $query=$this->condb->prepare("SELECT advertisements.id, users.name, advertisements.title FROM advertisements INNER JOIN users ON advertisements.userId = users.id");
                $query->execute();
                $res=$query->get_result();

                while ($row = $res->fetch_assoc()) {
                    $advertisements[] = new advertisement_model($row['id'], $row['name'], $row['title']);
                }

                $query->close();

                return $advertisements;
            }
            catch(Exception $e)
            {
                throw $e;
            }
            finally
            {
                $this->close_db();
            }
        }

    }

?>
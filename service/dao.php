<?php
    require 'model/user_model.php';
    require 'model/advertisement_model.php';

/**
 * @property mysqli $connect_database
 */
class dao {

    private $host;
    private $user;
    private $pass;
    private $db;
    // Set database config for mysql
    function __construct($consetup) {
            $this->host = $consetup->host;
            $this->user = $consetup->user;
            $this->pass = $consetup->pass;
            $this->db = $consetup->db;
    }
    // Open mysql database connection
    public function open_db() {
        $this->connect_database = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->connect_database->connect_error) {
            die("Error in connection: " . $this->connect_database->connect_error);
        }
    }
    // Close database connection
    public function close_db() {
        $this->connect_database->close();
    }
    // Select users.
    public function selectUsers() {
        $users = array();

        try {
            $this->open_db();
            $query=$this->connect_database->prepare("SELECT * FROM users");
            $query->execute();
            $res=$query->get_result();

            while ($row = $res->fetch_assoc()) {
                $users[] = new user_model($row['id'], $row['name']);
            }

            $query->close();

            return $users;
        } catch(Exception $e) {
            echo "Something went wrong";
        } finally {
            $this->close_db();
        }
        return null;
    }
    // Select advertisements with users names.
    public function selectAdvertisements() {
        $advertisements = array();

        try {
            $this->open_db();
            $query=$this->connect_database->prepare("SELECT advertisements.id, users.name, advertisements.title FROM advertisements INNER JOIN users ON advertisements.userId = users.id");
            $query->execute();
            $res=$query->get_result();

            while ($row = $res->fetch_assoc()) {
                $advertisements[] = new advertisement_model($row['id'], $row['name'], $row['title']);
            }

            $query->close();

            return $advertisements;
        } catch(Exception $e) {
            echo "Something went wrong!";
        } finally {
            $this->close_db();
        }
        return null;
    }

}

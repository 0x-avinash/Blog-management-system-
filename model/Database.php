<?php

class Database
{
    private static $instance = null;
    private $connection;
    private $host = "localhost";
    private $username = 'root';
    private $password = '';
    private $dbname = 'blog';

    private function __construct()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->dbname
        );

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function addBlog($title, $description, $image_path)
    {
        $stmt = $this->getConnection()->prepare("INSERT INTO blog_post (title, description, image_path) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Prepare failed: " . $this->getConnection()->error);
        }
        $stmt->bind_param("sss", $title, $description, $image_path);
        if (!$stmt->execute()) {
            die("Execution failed: " . $stmt->error);
        }
        $stmt->close();
    }

    public function editBlog($title, $description, $image_path, $id)
    {
        $stmt = $this->getConnection()->prepare("UPDATE blog_post SET title = ?, description = ?, image_path = ? WHERE id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $this->getConnection()->error);
        }
        $stmt->bind_param("sssi", $title, $description, $image_path, $id);
        if (!$stmt->execute()) {
            die("Execution failed: " . $stmt->error);
        }
        $stmt->close();
    }

    public function getAllblog()
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM blog_post ORDER BY id DESC");
        if (!$stmt) {
            die("Prepare failed: " . $this->getConnection()->error);
        }
        $stmt->execute();
        

        return $stmt->get_result();
    }

    public function getDataByID($id)
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM blog_post WHERE id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $this->getConnection()->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function deleteblog($id)
    {
        $stmt = $this->getConnection()->prepare("DELETE FROM blog_post WHERE id = ?");
        if (!$stmt) {
            die("Prepare failed: " . $this->getConnection()->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
    public function adduser($username, $email, $password)
    {
        // check if email already exists
        $checkEmailStmt = $this->getConnection()->prepare("SELECT email FROM register_user WHERE email = ?");
        $checkEmailStmt->bind_param("s", $email); // bind the email value
        $checkEmailStmt->execute();
        $checkEmailStmt->store_result();  //buffer (store) the entire result set in memory on the client side.

        if ($checkEmailStmt->num_rows > 0) {
            echo "Email ID already exists";
            return false;
        } else {
            //  Insert new user
            $stmt = $this->getConnection()->prepare("INSERT INTO register_user (username, email, password) VALUES (?, ?, ?)");

            if (!$stmt) {
                die("Prepare failed: " . $this->getConnection()->error);
            }

            $stmt->bind_param("sss", $username, $email, $password);
            $stmt->execute();
            echo "User created successfully";
            return $this->getConnection()->insert_id; //  Return insert ID or success message
        }
    }
    public function getPassword($email)
    {
        $stmt = $this->getConnection()->prepare("SELECT password FROM register_user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($db_password);
            $stmt->fetch();
            return $db_password;  
        } else {
            return false;  
        }
    }

    public function createSession($email)
    {
        $stmt = $this->getConnection()->prepare("SELECT * from register_user where email= ?");
        $stmt->execute();
        $stmt->execute();
        return $stmt->get_result();
    }



















}
?>
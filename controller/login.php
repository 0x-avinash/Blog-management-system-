<?php
require_once __DIR__ . '/../model/Database.php';

class Login
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function register()
    {
        include 'view/register.php';
    }
    public function saveCredentials()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->db->adduser($username, $email, $password);
            header('Location: /avinash/blog/index.php/login');

        }
    }
    public function login()
    {
        $message = $_SESSION['message'] ?? null;
        unset($_SESSION['message']); 
        include 'view/login.php';
    }

    public function checkCredential()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dbPassword = $this->db->getPassword($email);
            if ($dbPassword) {
                if ($password === $dbPassword) {

                    $_SESSION['message'] = "Login successful";
                    $email = $_POST['email'];
                    $user_data = $this->db->createSession($email); // returns array of rows
                    if (!empty($user_data)) {
                        $user = $user_data[0];
                        // Store in session
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['username'] = $user['username'];

                    } else {
                        $_SESSION['message'] = 'User not found';
                        //echo "User not found.";
                    }
                    header("Location: /avinash/blog/index.php/home");
                } else {
                    $message = 'Incorrect password';
                    $_SESSION['message'] = $message;
                   // echo 'Incorrect password';
                    header("Location: /avinash/blog/index.php/login");
                }
            } else {
                $message= 'Email not found';
                $_SESSION['message'] = $message;
                // echo 'Email not found';
                header("Location: /avinash/blog/index.php/login");
            }
        }
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /avinash/blog/index.php/home");
    }
    
}






















?>
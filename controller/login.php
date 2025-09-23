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
    public function save_credentials()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->db->adduser($username, $email, $password);

            header('Location: /avinash/blog/index.php/login');
            exit(); //  stop script after redirect
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $dbPassword = $this->db->getPassword($email);
            if ($dbPassword) {
                if ($password === $dbPassword) {
                    echo "Login successful";
                    header("Location: /avinash/blog/index.php/session");
                } else {
                    echo "Incorrect password";
                }
            } else {
                echo "Email not found";
            }
        }
        include 'view/login.php';
    }

    public function session()
    {

        session_start();
        echo "<br> id->";
        echo session_id();
        echo "<br session->>";
        print_r($_SESSION);
        echo "<br> ->request";
        print_r($_POST);
        echo "<br>";
        $_SESSION['username'] = $_POST['email'];
        echo "Sesssion Start username :" . $_SESSION['username'];
    }



}






















?>
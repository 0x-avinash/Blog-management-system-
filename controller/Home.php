<?php

require_once __DIR__ . '/../model/Database.php';

class Home
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function uploadfile()
    {
        if (!isset($_FILES['image_path']) || $_FILES['image_path']['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $FileName = basename($_FILES['image_path']['name']);
        $tmpfile = $_FILES['image_path']['tmp_name'];
        $uploadDir = __DIR__ . "/../view/static/uploads/";
        $fullpath = $uploadDir . $FileName;
        $fileType = mime_content_type($tmpfile);

        if (strpos($fileType, 'image/') !== 0) {
            return null;
        }

        if (!move_uploaded_file($tmpfile, $fullpath)) {
            return null;
        }

        return 'view/static/uploads/' . $FileName;
    }

    public function addAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /avinash/blog/index.php/login");
        }
        include 'view/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $id = isset($_POST['id']) ? (int) $_POST['id'] : null;
            $user_id = isset($_SESSION['user_id']) ? (int) $_SESSION['user_id'] : null;
            $image_path = $this->uploadfile();
            if (!$image_path) {
                $image_path = $_POST['old_image'] ?? '';
            }
            if (!empty($id)) {

                $this->db->editBlog($title, $description, $image_path, $id);
            } else {
                $this->db->addBlog($user_id, $title, $description, $image_path);
            }

            header('Location: /avinash/blog/index.php/view');

        }
    }

    public function deleteAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /avinash/blog/index.php/login");
        }
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
            $this->db->deleteblog($id);
        }
        header('Location: /avinash/blog/index.php/view');

    }

    public function listView()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /avinash/blog/index.php/login");
        }
        $user_id = $_SESSION['user_id'];
        $result = $this->db->getDataByUserID($user_id);
        $post = [];

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $post[] = $row;
            }
        }

        include 'view/list.php';
    }

    public function editAction()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: /avinash/blog/index.php/login");
        }
        $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
        $stmt = $this->db->getDataByID($id);
        $result = $stmt->fetch_array();
        include 'view/edit.php';
    }

    public function home()
    {
        $stmt = $this->db->getAllblog();
        $data = [];

        while ($row = $stmt->fetch_assoc()) {
            $data[] = $row;
        }
        $isLoggedIn = isset($_SESSION['username']);
        include 'view/home.php';
    }


    function pageView()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : null;
        $stmt = $this->db->getDataByID($id);
        $post = $stmt->fetch_array();
        include 'view/page.php';

    }
}
?>
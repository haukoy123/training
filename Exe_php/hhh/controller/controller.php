<?php

require_once('models/model.php');

class controller extends model
{

    private $pmodel;

    // public function __construct()
    // {
    //     $this->pmodel = new model();
    // }

    function ShowController()
    {
        $from = 0;
        $limit = 3;
        if (isset($_GET['limit']) && !empty($_GET['limit'])) {
            $limit = $_GET['limit'];
        }
        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $from = ($_GET['page'] - 1) * $limit;
        }
        $data = $this->Data($from, $limit);
        $count = $this->CountData();
        $this->ViewAll('admin', 'all', $data, $count, $limit);
    }

    function DetaiController()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $val = $this->Detail($id);
            $this->ViewController('admin', 'show', $val);
        }
    }

    function ViewAll($contl, $action, $val, $count, $limit)
    {
        include  $contl . "/" . $action . '.php';
    }

    function ViewController($contl, $action, $val)
    {
        include  $contl . "/" . $action . '.php';
    }

    function AddController()
    {
        $this->ViewController("admin", "add", null);
    }

    function oke()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['file'];
        $status = $_POST['status'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (isset($_POST['add'])) {
            $create_at = date('Y-m-d H:i:s');
            $this->AddModel($title, $description, $image, $status, $create_at);
        }
        header("location: http://localhost/index.php");
        exit();
    }


    function UpdateController()
    {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $image = $_POST['file'];
        $status = $_POST['status'];
        $update_at = date('Y-m-d H:i:s');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        if (isset($_POST['edit'])) {
            $this->UpdateModel($id, $title, $description, $image, $status, $update_at);
        }
        header("location: http://localhost/index.php");
        exit();
    }


    function DeleteController()
    {
        $id = $_GET['id'];
        $this->Delete($id);
        header("location: http://localhost/index.php");
        exit();
    }



    function EditController()
    {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $val = $this->Detail($id);
            $this->ViewController("admin", "edit", $val);
        }
    }
}

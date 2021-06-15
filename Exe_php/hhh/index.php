<?php
require_once "controller/controller.php";


$ctrl = '';
if (isset($_GET['controller']) && !empty($_GET['controller'])) {
    $ctrl = $_GET['controller'];

    if ($ctrl == "admin") {
        $action = '';
        $c = new controller();
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            $action = $_GET['action'];
        }
        if ($action == "oke") {
            $c->oke();
        } elseif ($action == "edit") {
            $c->EditController();
        } elseif ($action == "add") {
            $c->AddController($ctrl, $action);
        } elseif ($action == "show") {
            $c->DetaiController();
        } elseif ($action == "update") {
            $c->UpdateController();
        }elseif($action == "delete") {
            $c->DeleteController();
        }
        else
            header("location: http://localhost/index.php");
        exit;
    }
} else {
    $c = new controller();
    $c->ShowController();
}

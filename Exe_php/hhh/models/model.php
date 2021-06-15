<?php
require_once("sql_connect.php");

class model extends db
{
    // private $db;

    // public function __construct()
    // {
    //     $this->db = new db();
    // }

    function CountData()
    {
        $count = 0;
        $this->connect();
        $sql = "select * from posts";
        $val = mysqli_query($this->conn, $sql);
        while ($row = mysqli_fetch_assoc($val)) {
            $count = $count + 1;
        }
        $this->close();
        return $count;
    }

    function Data($from, $row)
    {
        $this->connect();
        $sql = "select * from posts limit " . $from . "," . $row;
        $val = mysqli_query($this->conn, $sql);
        $this->close();
        return $val;
    }

    function AddModel($title, $description, $image, $status, $create_at)
    {
        $this->connect();
        $sql = "insert into posts(title, description, image, status, create_at) 
        values ('" . $title . "', '" . $description . "', '" . $image .
            "'," . $status . ",'" . $create_at . "')";
        if ($this->conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        $this->close();
    }

    function UpdateModel($id, $title, $description, $image, $status, $update_at)
    {
        $this->connect();
        $sql = "UPDATE posts 
        SET title='" . $title . "', description='" . $description . "',
        image='" . $image . "',status=" . $status . ",  update_at='" . $update_at . "'
        WHERE id=" . $id;
        if ($this->conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
        $this->close();
    }


    function Detail($id)
    {
        $this->connect();
        $sql = "select * from posts where id = " . $id;
        $val = mysqli_query($this->conn, $sql);

        if ($val->num_rows == 1) {
            $val = mysqli_fetch_assoc($val);
        }
        $this->close();
        return $val;
    }


    function Delete($id)
    {
        $this->connect();
        $sql = "delete from posts where id = " . $id;
        $val = mysqli_query($this->conn, $sql);
    }
}

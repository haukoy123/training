<?php

class db
{

  const HostName = "db";
  const Username = 'tranhau';
  const Password = 'haudev';
  const Database = 'btphp';

  public $conn;

  // public $title, $description, $image, $status, $create_at, $update_at;

  // public function __construct($title, $description, $image, $status, $create_at, $update_at)
  // {
  //   $this->title=$title;
  //   $this->description=$description;
  //   $this->image=$image;
  //   $this->status=$status;
  //   $this->create_at=$create_at;
  //   $this->update_at=$update_at;
  // }

  function connect(){
    $this->conn = mysqli_connect(self::HostName, self::Username, self::Password, self::Database);;

    mysqli_query($this->conn, "SET NAMES 'UTF8'");
    if (!$this->conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "show tables like 'posts'";
    $val = mysqli_query($this->conn, $sql);
    if ($val->num_rows == 0) {
      $this->create_tb($this->conn);
    }
    return $this->conn;
  }


  function create_tb($conn) 
  {
    $sql = "create table posts( 
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
      title varchar(100), 
      description text, 
      image varchar(100), 
      status int, 
      create_at datetime, 
      update_at datetime
      )";

    if ($conn->query($sql) === TRUE) {
      echo "Table MyGuests created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
  }

  function close(){
    $this->conn->close();
  }
}

<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = md5($_POST['password']);

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server ".mysqli_connect_error()."</br>";
  else{
    $query = "insert into member(name,email,password,status) values('$name','$email','$pass','INACTIVE')";

    if($connection->query($query)==TRUE){
      echo "<script> alert('Registered successfully Get your membership activated by Admin!!');
      window.location.replace('login-member.html');
      </script>";
    }
  }
 ?>

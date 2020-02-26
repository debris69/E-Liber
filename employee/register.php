<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = md5($_POST['password']);

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server ".mysqli_connect_error()."</br>";
  else{
    $query = "insert into employee(name,email,password) values('$name','$email','$pass')";

    if($connection->query($query)==TRUE){
      echo "<script> alert('Data sent to Admin for activation successfully!!');
      window.location.replace('login-employee.html');
      </script>";
    }
  }
 ?>

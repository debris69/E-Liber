<?php

  $id = $_POST['id'];
  $role = $_POST['role'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{
    $query = "update employee set role='$role' where id=$id";

    if($connection->query($query)==TRUE){
      session_start();
      $_SESSION['employee-list']='';
      echo "<script> alert('Employee Role Updated!!');
      window.location.replace('manage-employee.php');
      </script>
      ";
    }
  }

 ?>

<?php

  $id = $_POST['id'];
  $status = $_POST['status'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{
    $query = "update member set status='$status' where id=$id";

    if($connection->query($query)==TRUE){
      session_start();
      $_SESSION['member-list']='';
      echo "<script> alert('Membership Status Updated!!');
      window.location.replace('manage-member.php');
      </script>
      ";
    }
  }

 ?>

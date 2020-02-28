<?php
  session_start();
  $id = $_POST['id'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error();
  else{
    $query = "delete from issue_cart where id={$id}";
    if($connection->query($query)==TRUE){
      $_SESSION['cart']-=1;
      echo "<script> alert('Book removed from cart!! Cart status {$_SESSION['cart']}/2');
      window.location.replace('issue-cart.php');
      </script>";
    }
    else{
      echo "error".$connection->error;
    }
  }
 ?>

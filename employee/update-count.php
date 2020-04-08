<?php
  $count = $_POST['count'];
  $id = $_POST['id'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{
    $query  = "update book set count=$count where id=$id";

    if($connection->query($query)==TRUE){
      session_start();
      $_SESSION['update-list']='';
      echo "<script> alert('Book count updated!! Number Available: $count');
      window.location.replace('add-books.php');
      </script>
      ";
    }

  }
 ?>

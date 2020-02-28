<?php
  $id = $_POST['id'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo mysqli_connect_error();
  else{
    $query = "select * from borrowed_book where id=$id";
    $result = $connection->query($query) or die($connection->error);
    $result = $result->fetch_assoc();

    $query2 = "update book set count=(select count+1 from book where id={$result['book']}) where id={$result['book']}";

    $query = "delete from borrowed_book where id=$id";
    if($connection->query($query)==TRUE){
      if($connection->query($query2)==TRUE){
        session_start();
        $_SESSION['borrowed']-=1;

        echo "<script> alert('Book Returned!!');
        window.location.replace('return-books.php');
        </script>";
      }

    }
  }

 ?>

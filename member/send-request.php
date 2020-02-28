<?php
  session_start();
  $id = $_POST['id'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo mysqli_connect_error();
  else{
    $query = "select * from issue_cart where id=$id";

    $result = $connection->query($query) or die($connection->error);
    $result = $result->fetch_assoc();

    $member = $result['member'];
    $book = $result['book'];

    $query = "insert into issue_request(member,book) values($member,$book)";
    if($connection->query($query)==TRUE){
      $_SESSION['cart']-=1;

      $query = "delete from issue_cart where id={$id}";
      if($connection->query($query)==TRUE){

        echo "<script> alert('Issue Request sent!! Cart status {$_SESSION['cart']}/2');
        window.location.replace('issue-cart.php');
        </script>";
      }

    }



  }
 ?>

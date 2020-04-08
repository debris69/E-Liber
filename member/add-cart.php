<?php

  session_start();
  $id = $_SESSION['id'];
  $book = $_POST['book'];

  include('connection.php');
  if($_SESSION['status']!='INACTIVE'){
    if($_SESSION['cart']<2){
      if(mysqli_connect_errno())
        echo "Failed to connect to server ".mysqli_connect_error()."</br>";
      else{
        $query = "insert into issue_cart(member,book) values($id,$book)";
        if($connection->query($query)==TRUE){
          $_SESSION['cart']+=1;
          echo "<script> alert('Book added to cart!! Cart status {$_SESSION['cart']}/2');
          window.location.replace('dashboard-member.php');
          </script>";
        }
        else{
          echo "error".$connection->error;
        }
      }
    }
    else{
      echo "<script> alert('You have exceeded the number of books you can add to cart!!');
      window.location.replace('dashboard-member.php');
      </script> ";
    }
  }
  else{
    echo "<script> alert('Issue Request or Cart is blocked for inactive members!!');
    window.location.replace('dashboard-member.php');
    </script> ";
  }



 ?>

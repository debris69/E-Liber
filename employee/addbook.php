<?php
  $name = $_POST['name'];
  $author = $_POST['author'];
  $year = $_POST['year'];
  $genre = $_POST['genre'];
  $type = $_POST['type'];
  $count = $_POST['count'];
  $tags = $_POST['tags'];



  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server ".mysqli_connect_error()."</br>";
  else{
    $query = "insert into book(name,author,year,genre,type,count,tags) values(\"$name\",'$author'
    ,$year,'$genre','$type',$count,'$tags')";

    
    if($connection->query($query)==TRUE){
      echo "<script> alert('Book added to database!!');
      window.location.replace('add-books.php');
      </script>";
    }
    else{

    }
  }
 ?>

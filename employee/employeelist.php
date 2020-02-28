<?php
  $search = $_POST['srchtxt'];
  $option = $_POST['option'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{

    if($option=='all'){
      $query = "select * from employee where name like '%{$search}%'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<style> .employee-list th{ padding: 15px 105px; }</style> <table align='center' cellpadding='16' class='employee-list'><tr><th>ID</th> <th>Name</th> <th> E-mail </th> <th> Role </th> </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['role']."</td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<p>No match found!!</p>";
      }
    }

    if($option=='admin'){
      $query = "select * from employee where name like '%{$search}%' and role='ADMIN'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' cellpadding='16' class='employee-list'><tr> <th>ID</th> <th>Name</th> <th> E-mail </th> <th> Role </th> <th> Change</th><th>Deactivate</th></tr>";
        while($row = $result->fetch_assoc()){
          $var = $var ."<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['role']}</td><td><button class='btn btn-warning' onclick='demote({$row['id']})'>Demote</button></td><td><button class='btn btn-danger' onclick='deactivate({$row['id']})'>Deactivate</button></td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<p>No match found!!</p>";
      }
    }

    if($option=='librarian'){
      $query = "select * from employee where name like '%$search%' and role='LIBRARIAN'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' cellpadding='16' class='employee-list'><tr> <th>ID</th> <th>Name</th> <th> E-mail </th> <th> Role </th> <th> Change</th> <th>Deactivate</th></tr>";
        while($row = $result->fetch_assoc()){
          $var = $var ."<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['role']}</td><td><button class='btn btn-success' onclick='promote({$row['id']})'>Promote</button></td><td><button class='btn btn-danger' onclick='deactivate({$row['id']})'>Deactivate</button></td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<p>No match found!!</p>";
      }
    }

    if($option=='other'){
      $query = "select * from employee where name like '%$search%' and role=''";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<style> .employee-list th{padding: 15px 85px;}</style><table align='center' cellpadding='16' class='employee-list'><tr> <th>ID</th> <th>Name</th> <th> E-mail </th> <th> Role </th> <th> Change</th></tr>";
        while($row = $result->fetch_assoc()){
          $var = $var ."<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td><td>{$row['role']}</td><td><button class='btn btn-success' onclick='activate({$row['id']})'>Activate</button></td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<p>No match found!!</p>";
      }
    }

    session_start();
    $_SESSION['employee-list']= $var;

    header('Location: manage-employee.php');

  }
 ?>

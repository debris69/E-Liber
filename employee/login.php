<html>
<body>
<?php
  //retrieve email - password
  $email = $_POST['email'];
  $pass  = md5($_POST['password']);


  //include connection
  include('connection.php');
  if(mysqli_connect_errno())
    echo "Failed to connect to server".mysqli_connect_error()."</br>";
  else{

    //query to check
    $query = "select * from employee where email='$email' and password='$pass' limit 1";
    $result = $connection->query($query) or die($connection->error);
    $result = $result->fetch_assoc();

    //password match and session storing
    if($result['email']==$email && $result['password']==$pass){
      session_start();
      $_SESSION['active']='yes';
      $_SESSION['name']=$result['name'];
      $_SESSION['id']=$result['id'];
      $_SESSION['email']=$result['email'];
      $_SESSION['role']=$result['role'];

      //inactive account check
      if(strlen($_SESSION['role'])==0){
        $_SESSION['active']='no';
        echo "<script> alert(' Hello {$_SESSION["name"]}!! Your account is not active yet! Contact Admin!');
        window.location.replace('../index.html');
        </script>";

      }

      //successful login redirect
      else{
        echo "<script> alert('Login Successful! Hello {$_SESSION["name"]}');
        window.location.replace('dashboard-employee.php');
        </script>";

      }


    }
    
    //unsucessful login redirect
    else{
      echo "<script> alert('Login Unsucessful! No Match Found!!');
      window.location.replace('login-employee.html');
      </script>";
    }
  }

 ?>
</body>

</html>

<?php
  $option = $_POST['option'];

  include('connection.php');
  if(mysqli_connect_errno())
    echo mysqli_connect_error();
  else {

    if($option=='pending'){
      $query = "select issue_request.id, member.name as member, book.name as book from issue_request inner join book inner join member where issue_request.book = book.id and issue_request.member = member.id and response=''";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' class='issue-list'> <tr> <th>ID</th> <th>Book</th> <th>Member</th> <th>Accept</th> <th>Reject</th> </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>{$row['id']}</td><td>{$row['book']}</td><td>{$row['member']}</td><td><button class='btn btn-success' onclick='accept({$row['id']})'>Accept</button></td><td><button class='btn btn-danger' onclick='reject({$row['id']})'>Reject</button></td></tr>";
        }
        $var = $var."</table>";
      }
      else{
        $var = "<img src=\"../img/smile.svg\" class=\"smile\" >
        <p>There are no pending issue requests!!</p>";
      }
    }

    if($option=='accepted'){
      $query = "select issue_request.id, member.name as member, book.name as book from issue_request inner join book inner join member where issue_request.book = book.id and issue_request.member = member.id and response='ACCEPTED'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' class='issue-list'> <tr> <th>ID</th> <th>Book</th> <th>Member</th>  </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>{$row['id']}</td><td>{$row['book']}</td><td>{$row['member']}</td></tr>";
        }
        $var = $var."</table>";
      }
    }

    if($option=='rejected'){
      $query = "select issue_request.id, member.name as member, book.name as book from issue_request inner join book inner join member where issue_request.book = book.id and issue_request.member = member.id and response='REJECTED'";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' conclass='issue-list'> <tr> <th>ID</th> <th>Book</th> <th>Member</th>  </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>{$row['id']}</td><td>{$row['book']}</td><td>{$row['member']}</td></tr>";
        }
        $var = $var."</table>";
      }
    }
    if($option=='all'){
      $query = "select issue_request.id, member.name as member, book.name as book, issue_request.response from issue_request inner join book inner join member where issue_request.book = book.id and issue_request.member = member.id";
      $result = $connection->query($query) or die($connection->error);
      if(mysqli_num_rows($result)>0){
        $var = "<table align='center' class='issue-list'> <tr> <th>ID</th> <th>Book</th> <th>Member</th> <th>Response</th> </tr>";
        while($row = $result->fetch_assoc()){
          $var = $var."<tr><td>{$row['id']}</td><td>{$row['book']}</td><td>{$row['member']}</td><td>{$row['response']}</td></tr>";
        }
        $var = $var."</table>";
      }
    }

    session_start();
    $_SESSION['request-list'] = $var;

    header('Location: issue-requests.php');

  }
 ?>

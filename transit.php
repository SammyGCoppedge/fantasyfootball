<?php
include 'connection.php';
session_start();

$username = filter_input(INPUT_POST, 'loginname');
$password = filter_input(INPUT_POST, 'loginpass');

if (!empty($username))
{
  if (!empty($password))
  {
      $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
      $result = $userconn->query($sql);

      if (mysqli_num_rows($result) > 0)
      {
        $loggedin = $result->fetch_assoc();
        $usertype = $loggedin["authority"];
        $_SESSION['loggedin'] = $loggedin;
        $_SESSION['usertype'] = $usertype;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header("Location: userpage.php");
      }
      else
      {
        $_SESSION['loginerror'] = "true";
        header("Location: index.php");
      }
  }
  else
  {
    $_SESSION['loginerror'] = "true";
    header("Location: index.php");
  }
}
else
{
  $_SESSION['loginerror'] = "true";
  header("Location: index.php");
}
?>

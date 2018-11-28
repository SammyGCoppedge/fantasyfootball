<?php
  session_start();
  include 'connection.php';

  $loggedin = $_SESSION['loggedin'];
  $usertype = $_SESSION['usertype'];
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
  $flag = "";

  $sql = filter_input(INPUT_POST, 'teamquery');
  $command = $_POST['radioadd'];
  if (isset($sql))
  {
    $flag = "teamquery";
    sendQuery($command, $sql, $flag, $username, $usertype);
    header("Location: userpage.php");
  }
  else
  {
    $sql = filter_input(INPUT_POST, 'playerquery');
    if (isset($sql))
    {
      $flag = "playerquery";
      sendQuery($command, $sql, $flag, $username, $usertype);
      header("Location: userpage.php");
    }
    else
    {
      $sql = filter_input(INPUT_POST, 'gamequery');
      if (isset($sql))
      {
        $flag = "gamequery";
        sendQuery($command, $sql, $flag, $username, $usertype);
        header("Location: userpage.php");
      }
      else
      {
        $sql = filter_input(INPUT_POST, 'playquery');
        if (isset($sql))
        {
          $flag = "playquery";
          sendQuery($command, $sql, $flag, $username, $usertype);
          header("Location: userpage.php");
        }
        else
        {
          $_SESSION['queryerror'] = "true";
          header("Location: userpage.php");
        }
      }
    }
  }

  function sendQuery($command, $query, $flag, $username, $usertype)
  {
    include 'connection.php';
    if ($usertype = "League Manager")
    {
      switch ($flag)
      {
        case "teamquery":
          if($usertype = "League Manager")
          {
            $query = parse($query, $flag);
            $result = $conn-> query("SELECT leagueID FROM league WHERE leagueManager = '$username'");
            $result = $result->fetch_assoc();
            $leagueID = $result['leagueID'];

            if ($command == "add")
            {
              $query = "(" . $query . ", $leagueID)";
              $result = $conn-> query("INSERT INTO team VALUES " . $query);
            }
            if ($command == "delete")
            {
              $result = $conn-> query("DELETE FROM team WHERE teamName = $query AND leagueID = $leagueID");
            }
          }
          else
          {

          }
        case "playerquery":

        case "gamequery":

        case "playquery":

      }
    }
    else
    {
      echo "wow";
    }
  }
  function parse($query, $flag)
  {
      switch ($flag)
      {
        case "teamquery":
          preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $query, $qarray);
          $qstring = "";
          foreach ($qarray[0] as &$values)
          {
            $qstring .= $values . ", ";
          }
          $qstring = substr_replace($qstring, "", -1);
          $qstring = substr($qstring, 0, -1);
          return $qstring;

        case "playerquery":

        case "gamequery":

        case "playquery":
      }
  }
?>

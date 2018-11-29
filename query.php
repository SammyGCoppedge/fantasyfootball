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

    if ($usertype == "League Manager")
    {
      $result = $conn-> query("SELECT leagueID FROM league WHERE leagueManager = '$username'");
      $result = $result->fetch_assoc();
      $leagueID = $result['leagueID'];
    }

    $query = parse($query);

    switch ($flag)
    {
      case "teamquery":

        if($usertype == "League Manager")
        {
          if ($command == "add")
          {
            $query = "(" . $query . ", $leagueID)";
            echo "INSERT INTO team VALUES " . $query;
            $result = $conn-> query("INSERT INTO team VALUES " . $query);
          }
          if ($command == "delete")
          {
            $result = $conn-> query("DELETE FROM team WHERE teamName = $query AND leagueID = $leagueID");
          }
        }
        if($usertype == "Team Manager")
        {
          if ($command == "add")
          {
            $query = "(" . $query . ", '$username')";
            $result = $conn-> query("INSERT INTO team (teamName, teamPoints, teamWins, leagueID, teamManager) VALUES " . $query);
          }
          if ($command == "delete")
          {
            $result = $conn-> query("DELETE FROM team WHERE teamName = $query AND teamManager = '$username'");
          }
        }
      case "playerquery":

        if($usertype == "League Manager")
        {
          if ($command == "add")
          {
            $query = "(" . $query . ", $leagueID, false)";
            $result = $conn-> query("INSERT INTO player (playerName, dateOfBirth, teamName, position, playerPoints, leagueID, freeAgentStatus) VALUES " . $query);
          }
          if ($command == "delete")
          {
            $result = $conn-> query("DELETE FROM player WHERE playerName = $query AND leagueID = $leagueID");
          }
        }

        if ($usertype == "Team Manager")
        {
          if ($command == "add")
          {
            $query = "(" . $query . ", false)";
            echo $query;
            $result = $conn-> query("INSERT INTO player VALUES " . $query);
          }
          if ($command == "delete")
          {
            $result = $conn-> query("DELETE FROM player WHERE playerName = $query");
          }
        }
      case "gamequery":

        if($usertype == "League Manager")
        {
          if ($command == "add")
          {
            $query = "(" . $query . ", $leagueID)";
            $result = $conn-> query("INSERT INTO game (gameDate, winningTeam, losingTeam, leagueID) VALUES " . $query);
          }
          if ($command == "delete")
          {
            $result = $conn-> query("DELETE FROM game WHERE gameID = $query AND leagueID = $leagueID");
          }
        }

        if ($usertype == "Team Manager")
        {
          if ($command == "add")
          {
            $query = "(" . $query . ")";
            $result = $conn-> query("INSERT INTO game (gameDate, winningTeam, losingTeam, leagueID) VALUES " . $query);
          }
          if ($command == "delete")
          {
            $result = $conn-> query("DELETE FROM game WHERE gameID = $query");
          }
        }
      case "playquery":
      if($usertype == "League Manager")
      {
        if ($command == "add")
        {
          $query = "(" . $query . ")";
          $result = $conn-> query("INSERT INTO play (playerName, gameID, playType, pointsWorth) VALUES " . $query);
        }
        if ($command == "delete")
        {
          $result = $conn-> query("DELETE FROM play WHERE playID = $query");
        }
      }

      if ($usertype == "Team Manager")
      {
        if ($command == "add")
        {
          $query = "(" . $query . ")";
          $result = $conn-> query("INSERT INTO play (playerName, gameID, playType, pointsWorth) VALUES " . $query);
        }
        if ($command == "delete")
        {
          $result = $conn-> query("DELETE FROM play WHERE playID = $query");
        }
      }
    }
    echo mysqli_error($conn);
  }
  function parse($query)
  {
    preg_match_all('/"(?:\\\\.|[^\\\\"])*"|\S+/', $query, $qarray);
    $qstring = "";
    foreach ($qarray[0] as &$values)
    {
      $qstring .= $values . ", ";
    }
    $qstring = substr_replace($qstring, "", -1);
    $qstring = substr($qstring, 0, -1);
    return $qstring;
  }
?>

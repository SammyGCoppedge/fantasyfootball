<?php
  session_start();
  include 'connection.php';
  if (isset($_SESSION['queryerror']))
  {
    $queryerror = $_SESSION['queryerror'];
  }
  $loggedin = $_SESSION['loggedin'];
  $usertype = $_SESSION['usertype'];
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Userpage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
    body {
      font-family: "Verdana";
      background-image: url("https://i0.wp.com/www.forumhall.com.ua/wp-content/uploads/2016/04/Silver-Blur-Background.jpg");
      background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    #header {
      /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#b3e2fc+12,ffc6f0+48,ffc3a0+73&0+0,0.59+22,0.42+67,0+100 */
      background: -moz-linear-gradient(45deg, rgba(179,226,252,0) 0%, rgba(179,226,252,0.32) 12%, rgba(200,218,249,0.59) 22%, rgba(255,198,240,0.49) 48%, rgba(255,196,179,0.42) 67%, rgba(255,195,160,0.34) 73%, rgba(255,195,160,0) 100%); /* FF3.6-15 */
      background: -webkit-linear-gradient(45deg, rgba(179,226,252,0) 0%,rgba(179,226,252,0.32) 12%,rgba(200,218,249,0.59) 22%,rgba(255,198,240,0.49) 48%,rgba(255,196,179,0.42) 67%,rgba(255,195,160,0.34) 73%,rgba(255,195,160,0) 100%); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(45deg, rgba(179,226,252,0) 0%,rgba(179,226,252,0.32) 12%,rgba(200,218,249,0.59) 22%,rgba(255,198,240,0.49) 48%,rgba(255,196,179,0.42) 67%,rgba(255,195,160,0.34) 73%,rgba(255,195,160,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b3e2fc', endColorstr='#00ffc3a0',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
      margin-top: -25px;
    }

    #logout {
      float: right;
      float: top;
      margin: 15px;
      background-color: black !important;
      position: relative;
      margin-right: 15px;
      margin-top: 10px;
    }

    .nav-pills > li > a.active {
      /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffc3a0+0,ffbce2+1,b8d4fc+88&0+14,0.57+22,0.38+50,0.48+80,0+91 */
      background: -moz-linear-gradient(left, rgba(255,195,160,0) 0%, rgba(255,188,226,0) 1%, rgba(244,192,230,0) 14%, rgba(238,194,232,0.57) 22%, rgba(215,202,240,0.38) 50%, rgba(191,210,249,0.48) 80%, rgba(184,212,252,0.13) 88%, rgba(184,212,252,0) 91%) !important; /* FF3.6-15 */
      background: -webkit-linear-gradient(left, rgba(255,195,160,0) 0%,rgba(255,188,226,0) 1%,rgba(244,192,230,0) 14%,rgba(238,194,232,0.57) 22%,rgba(215,202,240,0.38) 50%,rgba(191,210,249,0.48) 80%,rgba(184,212,252,0.13) 88%,rgba(184,212,252,0) 91%) !important; /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(to right, rgba(255,195,160,0) 0%,rgba(255,188,226,0) 1%,rgba(244,192,230,0) 14%,rgba(238,194,232,0.57) 22%,rgba(215,202,240,0.38) 50%,rgba(191,210,249,0.48) 80%,rgba(184,212,252,0.13) 88%,rgba(184,212,252,0) 91%) !important; /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffc3a0', endColorstr='#00b8d4fc',GradientType=1 ); /* IE6-9 */
      color:black !important;
    }

    .nav-pills > li > a {
      color:black !important;
    }

    #teamone {
      height:510px;
      overflow: auto;
    }

    #playerone {
      height:510px;
      overflow: auto;
    }

    #gameone {
      height:510px;
      overflow: auto;
    }

    #playone {
      height:510px;
      overflow: auto;
    }

    #teamtext {
      margin-right: -15px;
      margin-left: -600px;
    }

    #teambutton {
      margin-right: 30px;
    }

    #playertext {
      margin-right: -15px;
      padding-left: 30px;
    }

    #playerbutton {
      margin-right: 30px;
    }

    #gametext {
      margin-right: -15px;
      padding-left: 30px;
    }

    #gamebutton {
      margin-right: 30px;
    }

    #teamform {
      margin-right: -10px;
      width: 1095px;
    }

    #playerform {
      margin-right: -10px;
      width: 1095px;
    }

    #playtext {
      margin-right: -15px;
      padding-left: 30px;
    }

    #radio1 {
      margin-left: 25px;
      padding-right: 35px;
    }

  </style>
</head>
<body>
  <form action="index.php">
    <button id="logout" type="submit" class="btn btn-primary">
      <?php
        echo $username . " -- Log Out";
      ?>
    </button>
  </form>
  <button id="logout" type="button" class="btn btn-primary" data-toggle="modal" data-target="#infoModal">
    Info
  </button>
  <br>
  <div id="header" class="jumbotron text-center">
    <?php
    if (isset($queryerror) && $queryerror == "true")
    {
      echo '
      <div class="alert alert-danger" role="alert">
      Your query was not recognized by our system. Please try again.
      </div>';
      $_SESSION['queryerror'] = "false";
    }
    ?>
    <h1>
      <?php
        echo $loggedin["authority"] . " Page";
      ?>
    </h1>
  </div>

  <div id="tableContainer" class="container-fluid">
    <div id="pillcontainer" class="container">

      <ul class="nav nav-pills red nav-justified" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#teamtables">Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#playertables">Players</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#gametables">Games</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="pill" href="#playtables">Plays</a>
        </li>
      </ul>

    </div>

    <br>
    <div class="tab-content">
      <div id="teamtables" class="container tab-pane fade show active">
        <div id="teamtables" class="container-full tab-pane fade show active">
          <center>
            <header>
              <h2>Your Teams</h2>
              <br>
                <form id="teamform" action="query.php" method="post">
                  <div class="row">
                    <div id="radio" class="col">
                      <div class="row">
                        <div id="radio1" class="radio">
                          <label><input type="radio" name="radioadd" checked value="add"> Add</label>
                        </div>
                        <div id="radio2" class="radio" value="delete">
                          <label><input type="radio" name="radioadd" value="delete"> Delete</label>
                        </div>
                      </div>
                    </div>
                    <div id="teamtext" class="col">
                      <input type="text" class="form-control" name="teamquery">
                    </div>
                    <button id="teambutton" type="submit" class="btn btn-dark">Send Request</button>
                  </div>
                </form>
              <br>
            </header>
          </center>
          <div id="teamone" class="col-md-12">
            <table id="team" class="table table-dark table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Team Name</th>
                  <th scope="col">Manager</th>
                  <th scope="col">Points</th>
                  <th scope="col">Wins</th>
                  <th scope="col">League</th>
                <tr>
              </thead>
              <?php
              if ($usertype == "League Manager")
              {
                $sql = "CREATE OR REPLACE VIEW lmteam AS SELECT * FROM team NATURAL JOIN league WHERE leagueManager = '$username'";
                $result = $conn-> query($sql);
                $sql = "SELECT * FROM lmteam";
                $result = $conn-> query($sql);

                $i = 1;
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $i . "</td><td>" . $row["teamName"] . "</td><td>" . $row["teamManager"] . "</td><td>" . $row["teamPoints"] . "</td><td>" . $row["teamWins"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
                    $i = $i + 1;
                }
              }
              else
              {
                $sql = "CREATE OR REPLACE VIEW tmteam AS SELECT * FROM team WHERE teamManager = '$username'";
                $result = $conn-> query($sql);
                $sql = "SELECT * FROM tmteam";
                $result = $conn-> query($sql);

                $i = 1;
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>"  . $i . "</td><td>" .  $row["teamName"] . "</td><td>" . $row["teamManager"] . "</td><td>" . $row["teamPoints"] . "</td><td>" . $row["teamWins"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
                    $i = $i + 1;
                }
              }
              ?>
            </table>
          </div>
        </div>
      </div>
      <div id="playertables" class="container tab-pane fade">
        <center>
          <header>
            <h2>Your Players</h2>
            <br>
            <form id="playerform" action="query.php" method="post">
              <div class="row">
                <div id="radio" class="col">
                  <div class="row">
                    <div id="radio1" class="radio">
                      <label><input type="radio" name="radioadd" checked value="add"> Add</label>
                    </div>
                    <div id="radio2" class="radio" value="delete">
                      <label><input type="radio" name="radioadd" value="delete"> Delete</label>
                    </div>
                  </div>
                </div>
                <div id="teamtext" class="col">
                  <input type="text" class="form-control" name="playerquery">
                </div>
                <button id="teambutton" type="submit" class="btn btn-dark">Send Request</button>
              </div>
            </form>
            <br>
          </header>
        </center>
        <div id="playerone" class="col-md-12">
          <table id="players" class="table table-dark table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Player Name</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Team Name</th>
                <th scope="col">Position</th>
                <th scope="col">Points</th>
              <tr>
            </thead>
            <?php
              if ($usertype == "League Manager")
              {
                $sql = "CREATE OR REPLACE VIEW lmplayer AS SELECT * FROM player NATURAL JOIN league WHERE leagueManager = '$username'";
                $result = $conn-> query($sql);
                $sql = "SELECT * FROM lmplayer";
                $result = $conn-> query($sql);

                $i = 1;
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>"  . $i . "</td><td>" . $row["playerName"] . "</td><td>" . $row["dateOfBirth"] . "</td><td>" . $row["teamName"] . "</td><td>" . $row["position"] . "</td><td>" . $row["playerPoints"] . "</td></tr>";
                    $i = $i + 1;
                }
              }
              else
              {
                $sql = "CREATE OR REPLACE VIEW tmplayer AS SELECT * FROM player NATURAL JOIN team WHERE teamManager = '$username'";
                $result = $conn-> query($sql);
                $sql = "SELECT * FROM tmplayer";
                $result = $conn-> query($sql);

                $i = 1;
                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>"  . $i . "</td><td>" . $row["playerName"] . "</td><td>" . $row["dateOfBirth"] . "</td><td>" . $row["teamName"] . "</td><td>" . $row["position"] . "</td><td>" . $row["playerPoints"] . "</td></tr>";
                    $i = $i + 1;
                }
              }
            ?>
            </table>
          </div>
      </div>
      <div id="gametables" class="container tab-pane fade">
        <center>
          <header>
            <h2>Your Games</h2>
            <br>
            <form id="teamform" action="query.php" method="post">
              <div class="row">
                <div id="radio" class="col">
                  <div class="row">
                    <div id="radio1" class="radio">
                      <label><input type="radio" name="radioadd" checked value="add"> Add</label>
                    </div>
                    <div id="radio2" class="radio" value="delete">
                      <label><input type="radio" name="radioadd" value="delete"> Delete</label>
                    </div>
                  </div>
                </div>
                <div id="teamtext" class="col">
                  <input type="text" class="form-control" name="gamequery">
                </div>
                <button id="teambutton" type="submit" class="btn btn-dark">Send Request</button>
              </div>
            </form>
            <br>
          </header>
        </center>
        <div id="gameone" class="col-md-12">
          <table id="games" class="table table-dark table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Game No.</th>
                <th scope="col">Game Date</th>
                <th scope="col">Winner</th>
                <th scope="col">Loser</th>
                <th scope="col">League</th>
              <tr>
            </thead>
            <?php
            if ($usertype == "League Manager")
            {
              $sql = "CREATE OR REPLACE VIEW lmgame AS SELECT * FROM game NATURAL JOIN (SELECT * FROM league WHERE leagueManager = '$username') AS t WHERE leagueID = t.leagueID";
              $result = $conn-> query($sql);
              $sql = "SELECT * FROM lmgame";
              $result = $conn-> query($sql);

              $i = 1;
              while ($row = $result->fetch_assoc())
              {
                  echo "<tr><td>"  . $i . "</td><td>" . $row["gameID"] . "</td><td>" . $row["gameDate"] . "</td><td>" . $row["winningTeam"] . "</td><td>" . $row["losingTeam"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
                  $i = $i + 1;
              }
            }
            else
            {
              $sql = "CREATE OR REPLACE VIEW tmgame AS SELECT * FROM game NATURAL JOIN (SELECT * FROM team WHERE teamManager = '$username') AS t WHERE winningTeam = t.teamName OR losingTeam = t.teamName";
              $result = $conn-> query($sql);
              $sql = "SELECT * FROM tmgame";
              $result = $conn-> query($sql);

              $i = 1;
              while ($row = $result->fetch_assoc())
              {
                  echo "<tr><td>"  . $i . "</td><td>" . $row["gameID"] . "</td><td>" . $row["gameDate"] . "</td><td>" . $row["winningTeam"] . "</td><td>" . $row["losingTeam"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
                  $i = $i + 1;
              }
            }
            ?>
          </table>
        </div>
      </div>
      <div id="playtables" class="container tab-pane fade">
        <center>
          <header>
            <h2>Your Plays</h2>
            <br>
            <form id="teamform" action="query.php" method="post">
              <div class="row">
                <div id="radio" class="col">
                  <div class="row">
                    <div id="radio1" class="radio">
                      <label><input type="radio" name="radioadd" checked value="add"> Add</label>
                    </div>
                    <div id="radio2" class="radio" value="delete">
                      <label><input type="radio" name="radioadd" value="delete"> Delete</label>
                    </div>
                  </div>
                </div>
                <div id="teamtext" class="col">
                  <input type="text" class="form-control" name="playquery">
                </div>
                <button id="teambutton" type="submit" class="btn btn-dark">Send Request</button>
              </div>
            </form>
            <br>
          </header>
        </center>
        <div id="playone" class="col-md-12">
          <table id="plays" class="table table-dark table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Play No.</th>
                <th scope="col">Player</th>
                <th scope="col">Game No.</th>
                <th scope="col">Game Date</th>
                <th scope="col">Team</th>
                <th scope="col">Type</th>
                <th scope="col">Points</th>
              <tr>
            </thead>
            <?php
            if ($usertype == "League Manager")
            {
              $sql = "CREATE OR REPLACE VIEW lmplay AS SELECT * FROM play NATURAL JOIN player NATURAL JOIN game NATURAL JOIN team NATURAL JOIN (SELECT * FROM league WHERE leagueManager = '$username') AS t";
              $result = $conn-> query($sql);
              $sql = "SELECT * FROM lmplay ORDER BY playID";
              $result = $conn-> query($sql);

              $i = 1;
              while ($row = $result->fetch_assoc())
              {
                  echo "<tr><td>"  . $i . "</td><td>" . $row["playID"] . "</td><td>". $row["playerName"] . "</td><td>" . $row["gameID"] . "</td><td>" . $row["gameDate"] . "</td><td>" . $row["teamName"] . "</td><td>" . $row["playType"] . "</td><td>" . $row["pointsWorth"] . "</td></tr>";
                  $i = $i + 1;
              }
            }
            else
            {
              $sql = "CREATE OR REPLACE VIEW tmplay AS SELECT * FROM play NATURAL JOIN game NATURAL JOIN team NATURAL JOIN player WHERE teamManager = '$username'";
              $result = $conn-> query($sql);
              $sql = "SELECT * FROM tmplay ORDER BY playID";
              $result = $conn-> query($sql);

              $i = 1;
              while ($row = $result->fetch_assoc())
              {
                  echo "<tr><td>"  . $i . "</td><td>" . $row["playID"] . "</td><td>" . $row["playerName"] . "</td><td>" . $row["gameID"] . "</td><td>" . $row["gameDate"] . "</td><td>" . $row["teamName"] . "</td><td>" . $row["playType"] . "</td><td>" . $row["pointsWorth"] . "</td></tr>";
                  $i = $i + 1;
              }
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Log In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="userpage.php" method="post">
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="loginname" id="name" aria-describedby="loginHelp" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" class="form-control" name="loginpass" id="password" placeholder="Enter password">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="infoModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Request Info</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <b>Team Requests</b><br><br>

          To add:<br>
          <b>League Managers:</b> "Team Name" "Manager Name" Points Wins<br>
          <b>Team Managers:</b> "Team Name" Points Wins League<br><br>

          To delete:
          <br>
          <b>All Managers:</b> "Team Name"

          <hr>
          <b>Player Requests</b><br><br>

          To add:<br>
          <b>League Managers:</b> "Team Name" "YYYY-MM-DD" "Team Name" "Position" Points<br>
          <b>Team Managers:</b> "Team Name" "YYYY-MM-DD" "Team Name" "Position" Points League<br><br>

          To delete:<br>
          <b>All Managers:</b> "Player Name"<br>
          <hr>
          <b>Game Requests</b><br><br>

          To add:<br>
          <b>League Managers:</b> "YYYY-MM-DD" "Winning Team Name" "Losing Team Name" Points<br>
          <b>Team Managers:</b> "YYYY-MM-DD" "Winning Team Name" "Losing Team Name" Points League<br><br>

          To delete:<br>
          <b>All Managers:</b> Game No.<br>
          <hr>
          <b>Play Requests</b><br><br>
          To add:<br>
          <b>All Managers:</b> "Player Name" GameID "Type" Points<br><br>

          To delete:<br>
          <b>All Managers:</b> Play No.
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
</body>
</html>

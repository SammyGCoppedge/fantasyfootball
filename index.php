<?php
  include 'connection.php';
  session_start();
  if (isset($_SESSION['loginerror']))
  {
    $loginerror = $_SESSION['loginerror'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>League</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>

    #header {
      /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#b3e2fc+12,ffc6f0+48,ffc3a0+73&0+0,0.59+22,0.42+67,0+100 */
      background: -moz-linear-gradient(45deg, rgba(179,226,252,0) 0%, rgba(179,226,252,0.32) 12%, rgba(200,218,249,0.59) 22%, rgba(255,198,240,0.49) 48%, rgba(255,196,179,0.42) 67%, rgba(255,195,160,0.34) 73%, rgba(255,195,160,0) 100%); /* FF3.6-15 */
      background: -webkit-linear-gradient(45deg, rgba(179,226,252,0) 0%,rgba(179,226,252,0.32) 12%,rgba(200,218,249,0.59) 22%,rgba(255,198,240,0.49) 48%,rgba(255,196,179,0.42) 67%,rgba(255,195,160,0.34) 73%,rgba(255,195,160,0) 100%); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(45deg, rgba(179,226,252,0) 0%,rgba(179,226,252,0.32) 12%,rgba(200,218,249,0.59) 22%,rgba(255,198,240,0.49) 48%,rgba(255,196,179,0.42) 67%,rgba(255,195,160,0.34) 73%,rgba(255,195,160,0) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00b3e2fc', endColorstr='#00ffc3a0',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
      margin-top: -25px;
    }

    h2 {
      padding-bottom: 15px;
    }

    body {
      font-family: "Verdana";
      background-image: url("https://i0.wp.com/www.forumhall.com.ua/wp-content/uploads/2016/04/Silver-Blur-Background.jpg");
      background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
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

    #tableone {
      padding-left: 50px;
      padding-right: 30px;

    }

    #tabletwo {
      padding-right: 50px;
      padding-left: 30px;

    }

    #login {
      float: right;
      float: top;
      margin-right: 15px;
      margin-top: 20px;
      background-color: black !important;
      position: relative;
    }

    #playerone {
      height:550px;
      overflow: auto;
    }

    #gameone {
      height:550px;
      overflow: auto;
    }

    #playone {
      height:550px;
      overflow: auto;
    }

  </style>
</head>

<body>
  <button id="login" type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
    Log In
  </button>
  <br>
  <div id="header" class="jumbotron text-center">
    <?php
    if (isset($loginerror) && $loginerror == "true")
    {
      echo '
      <div class="alert alert-danger" role="alert">
      Your login info did not match our database records. <button id="errorb" type="button" class="btn btn-danger" data-toggle="modal" data-target="#loginModal"> Try again. </button>
      </div>';
      $_SESSION['loginerror'] = "false";
    }
    ?>
    <h1>Fantasy Football Frontend</h1>
  </div>

  <div id="tableContainer" class="container-fluid">
    <div id="pillcontainer" class="container">

      <ul class="nav nav-pills red nav-justified" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="pill" href="#leaguetables">Leagues</a>
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

    <br><br>
    <div class="tab-content">
      <div id="leaguetables" class="container-full tab-pane fade show active">
        <div class="row">
          <div id="tableone" class="col-md-6">
            <center>
              <header>
                <h2>Top Teams in League 111</h2>
              </header>
            </center>
            <table id="teams" class="table table-dark table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Team Name</th>
                  <th scope="col">Manager</th>
                  <th scope="col">Points</th>
                  <th scope="col">Wins</th>
                  <th scope="col">League ID</th>
                <tr>
              </thead>
              <?php
                $sql = "SELECT * FROM team WHERE leagueID = 111 ORDER BY teamPoints DESC";
                $result = $conn-> query($sql);

                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["teamName"] . "</td><td>" . $row["teamManager"] . "</td><td>" . $row["teamPoints"] . "</td><td>" . $row["teamWins"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
                }
                ?>
            </table>
          </div>
          <div id="tabletwo" class="col-md-6">
            <center>
              <header>
                <h2>Top Teams in League 222</h2>
              </header>
            </center>
            <table id="teams" class="table table-dark table-hover table-striped">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Team Name</th>
                  <th scope="col">Manager</th>
                  <th scope="col">Points</th>
                  <th scope="col">Wins</th>
                  <th scope="col">League ID</th>
                <tr>
              </thead>
              <?php
                $sql = "SELECT * FROM team WHERE leagueID = 222 ORDER BY teamPoints DESC";
                $result = $conn-> query($sql);

                while ($row = $result->fetch_assoc())
                {
                    echo "<tr><td>" . $row["teamName"] . "</td><td>" . $row["teamManager"] . "</td><td>" . $row["teamPoints"] . "</td><td>" . $row["teamWins"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
                }
              ?>
            </table>
          </div>
        </div>
      </div>
      <div id="playertables" class="container tab-pane fade">
        <center>
          <header>
            <h2>Top Players</h2>
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
              $sql = "SELECT * FROM player ORDER BY playerPoints DESC";
              $result = $conn-> query($sql);
              $i = 1;
              while ($row = $result->fetch_assoc())
              {
                  echo "<tr><td>" . $i . "</td><td>" . $row["playerName"] . "</td><td>" . $row["dateOfBirth"] . "</td><td>" . $row["teamName"] . "</td><td>" . $row["position"] . "</td><td>" . $row["playerPoints"] . "</td></tr>";
                  $i = $i + 1;
              }
              ?>
            </table>
          </div>
      </div>
      <div id="gametables" class="container tab-pane fade">
        <center>
          <header>
            <h2>All Recent Games</h2>
          </header>
        </center>
        <div id="gameone" class="col-md-12">
          <table id="games" class="table table-dark table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Game No.</th>
                <th scope="col">Game Date</th>
                <th scope="col">Winner</th>
                <th scope="col">Loser</th>
                <th scope="col">League</th>
              <tr>
            </thead>
            <?php
            $sql = "SELECT * FROM game ORDER BY gameID DESC";
            $result = $conn-> query($sql);

            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $row["gameID"] . "</td><td>" . $row["gameDate"] . "</td><td>" . $row["winningTeam"] . "</td><td>" . $row["losingTeam"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
            }
            ?>
          </table>
        </div>
      </div>
      <div id="playtables" class="container tab-pane fade">
        <center>
          <header>
            <h2>Top Plays this Season</h2>
          </header>
        </center>
        <div id="playone" class="col-md-12">
          <table id="plays" class="table table-dark table-hover table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Player</th>
                <th scope="col">Game Date</th>
                <th scope="col">Team</th>
                <th scope="col">Type</th>
                <th scope="col">Points</th>
                <th scope="col">League</th>
              <tr>
            </thead>
            <?php
            $sql = "SELECT DISTINCT * FROM play NATURAL JOIN game NATURAL JOIN player ORDER BY play.pointsWorth DESC";
            $result = $conn-> query($sql);
            $i = 1;

            while ($row = $result->fetch_assoc())
            {
                echo "<tr><td>" . $i . "</td><td>" . $row["playerName"] . "</td><td>" . $row["gameDate"] . "</td><td>" . $row["teamName"] . "</td><td>" . $row["playType"] . "</td><td>" . $row["pointsWorth"] . "</td><td>" . $row["leagueID"] . "</td></tr>";
                $i = $i + 1;
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
          <form action="transit.php" method="post">
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

 <div class="modal" id="errorModal">
   <div class="modal-dialog">
     <div class="modal-content">

       <div class="modal-header">
         <h4 class="modal-title">Login Error</h4>
         <button type="button" class="close" data-dismiss="modal">&times;</button>
       </div>

       <div class="modal-body">
         Your password and name did not match our database entries!
       </div>

       <div class="modal-footer">
         <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       </div>

     </div>
   </div>
 </div>

</body>

</html>

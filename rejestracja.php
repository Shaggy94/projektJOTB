<?php
if(session_id() == ''){
    session_start();
}
include "connection.php";


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProjektJOTB</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href='loginstyle.css' type="text/css"/>
<link rel="stylesheet" href='css/register.css' type="text/css"/>
    </head>
    <body>
        <div class="container-fluid" style="z-index: 0;">
            <?php
            // session_start();
            $basicPath ='./';
            // include './connection.php';
            include './navbar.php';
?>
            <form class="form-horizontal" method="post" action="register.php">
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Hasło:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                </div>
              </div>
                  <div class="form-group">
                <label class="control-label col-sm-2" for="pwd2">Powtórz hasło:</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Enter password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" id="sub" class="btn btn-default">Zarejestruj</button>
                </div>
              </div>
            </form>

            <div class="col-md-10 col-md-offset-2"id="message">
              <h3>Hasło musi zawierać:</h3>
              <p id="letter" class="invalid"><b>Małą</b> literę</p>
              <p id="capital" class="invalid"><b>Dużą</b> literę</p>
              <p id="number" class="invalid"><b>Cyfrę</b></p>
              <p id="length" class="invalid">Minimalnie <b>8 znaków</b></p>
              <p id="repwd" class="invalid">Hasła muszą być<b>takie same</b></p>
            </div>
            <script src="register.js" type="text/javascript"></script>



        </div>

    </body>
</html>

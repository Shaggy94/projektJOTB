<?php

$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';

$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM faktury WHERE id=:id');
    $sth->bindParam(':id', $idGet);
    $sth->execute();

    $result = $sth->fetch();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProjektJOTB</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript" src="qrcode.js"></script>
        <link rel="stylesheet" href='qr.css' type="text/css"/>

    </head>
    <body>
        <div class="container-fluid">

          <div id="dane">
              Numer faktury: <?php echo $result['NumerFaktury'] ?></label><br>
              Data wystawienia: <?php echo $result['DataWystawienia'] ?><br>
              Imie: <?php echo $result['Imie'] ?><br>
              Nazwisko: <?php echo $result['Nazwisko'] ?><br>
              Ulica: <?php echo $result['Ulica'] ?><br>
              Numer domu: <?php echo $result['NumerDomu'] ?><br>
              Kod pocztowy: <?php echo $result['KodPocztowy'] ?><br>
              Miasto: <?php echo $result['Miasto'] ?><br>
              NIP: <?php echo $result['NIP'] ?><br>
              Kraj: <?php echo $result['Kraj'] ?><br>
          </div>
          <div id="qrcode"></div>
          <script src="qr.js" type="text/javascript"></script>
    </body>
</html>

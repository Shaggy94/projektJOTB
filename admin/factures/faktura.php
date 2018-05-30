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
				Numer faktury: <?php echo $result['NumerFaktury'] ?><br>
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
			
			<?php
				$file = "<?xml version=". chr(34) . "1.0". chr(34). " encoding=" . chr(34) . "UTF-8" . chr(34) ."?>" . PHP_EOL;
				$file .= "<faktura>".PHP_EOL;
				$file .= "<numer_faktury>". $result['NumerFaktury'] . "</numer_faktury>" . PHP_EOL;
				$file .= "<data_wystawienia>" . $result['DataWystawienia'] . "</data_wystawienia>" . PHP_EOL;
				$file .= "<dane_nabywcy>" . PHP_EOL;
				$file .= "<imie>" . $result['Imie'] . "</imie>" . PHP_EOL;
				$file .= "<nazwisko>" . $result['Nazwisko'] . "</nazwisko>" . PHP_EOL;
				$file .= "<adres>" . PHP_EOL;
				$file .= "<ulica>" . $result['Ulica'] . "</ulica>" . PHP_EOL;
				$file .= "<numer_domu>" . $result['NumerDomu'] . "</numer_domu>" . PHP_EOL;
				$file .= "<kod_pocztowy>" . $result['KodPocztowy'] . "</kod_pocztowy>" . PHP_EOL;
				$file .= "<miasto>" . $result['Miasto'] . "</miasto>" . PHP_EOL;
				$file .= "<nip>" . $result['NIP'] . "</nip>" . PHP_EOL;
				$file .= "<kraj>" . $result['Kraj'] . "</kraj>" . PHP_EOL;
				$file .= "</adres>". PHP_EOL;
				$file .= "</dane_nabywcy>" . PHP_EOL;
				$file .= "<dane_sprzedawcy>" . PHP_EOL;
				$file .= "<imie>Artur</imie>" . PHP_EOL;
				$file .= "<nazwisko>Wójtowicz</nazwisko>" . PHP_EOL;
				$file .= "<adres>" . PHP_EOL;
				$file .= "<ulica>Wolności</ulica>" . PHP_EOL;
				$file .= "<numer_domu>45</numer_domu>" . PHP_EOL;
				$file .= "<kod_pocztowy>34-400</kod_pocztowy>" . PHP_EOL;
				$file .= "<miasto>Nowy Targ</miasto>" . PHP_EOL;
				$file .= "<nip>4568942254</nip>" . PHP_EOL;
				$file .= "<kraj>Polska</kraj>" . PHP_EOL;
				$file .= "</adres>". PHP_EOL;
				$file .= "</dane_sprzedawcy>" . PHP_EOL;
				$file .= "</faktura>" . PHP_EOL;
				$_SESSION['file'] = $file;
			?>
			
		  <form method='get' action='pobierz.php'><div><button type='submit'>Pobierz fakturę</button></div></form>
          <div id="qrcode"></div>
          <script src="qr.js" type="text/javascript"></script>
    </body>
</html>

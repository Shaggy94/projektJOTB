<?php

$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';

$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM produkty WHERE id=:id');
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
			<?php
            include $basicPath . 'navbar.php';
            ?>
			<div id="dane">
				Nazwa produktu: <?php echo $result['Nazwa'] ?></label><br>
				Vat: <?php echo $result['VAT'] ?>%<br>
				Cena netto: <?php echo $result['CenaNetto'] ?><br>
				Opis produktu: <?php echo $result['Opis'] ?><br>
				Kod kreskowy: <?php echo $result['EAN13'] ?><br>
			</div>
			<?php
				if(strlen($result['EAN13']) == 8){
					$src = "ean8.js";
					$width = 134;
				}
				else if(strlen($result['EAN13']) == 13){
					$src = "ean13.js";
					$width = 190;
				}
			?>
			<canvas id="myCanvas" width=<?php echo $width ?> height="85"
				style="border:1px solid #c3c3c3;">
				Your browser does not support the canvas element.
			</canvas>
			<script>var data = <?php echo json_encode($result['EAN13'], JSON_HEX_TAG);?></script>
			<script src=<?php echo $src ?> type="text/javascript"></script>
			<div id="qrcode"></div>
			<script src="qr.js" type="text/javascript"></script>
		</div>
    </body>
</html>
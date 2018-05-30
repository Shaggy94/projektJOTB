
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ProjektJOTB</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href='loginstyle.css' type="text/css"/>

    </head>
    <body>
        <div class="container-fluid" style="z-index: 0;">
            <?php
            session_start();
            $basicPath ='./';
            include '../../connection.php';
            include '../../navbar.php';
            ?>
						<?php
							if(isset($_FILES['userfile']))
							{

								// $file = file_get_contents($_FILES['userfile']['tmp_name']);
								$xml=simplexml_load_file($_FILES['userfile']['tmp_name']) or die("Error: Cannot create object");

								// print_r($xml);
						echo '<table class="table table-striped">';
								foreach ($xml as $key) {
									echo "<tr><td>".strtoupper(str_replace("_"," ",$key->getName()))."</td><td>".$key."</td></tr>";
									foreach ($key->children() as $dane) {
										echo "<tr><td>".strtoupper(str_replace("_"," ",$dane->getName()))."</td><td>".$dane."</td></tr>";
										foreach ($dane->children() as $adres) {
											echo "<tr><td>".strtoupper(str_replace("_"," ",$adres->getName()))."</td><td>".$adres."</td></tr>";
									}
								}
								echo "</tr>";
						}
						echo "</table>";
						}
						echo '<button>Dodaj</button>';
						?>
        </div>

    </body>
</html>
<?php
function add(){

}
 ?>

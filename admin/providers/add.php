<?php
$basicPath = '../../';
include $basicPath.'header.php';
include $basicPath.'connection.php';

if (isset($_POST['nrs'])) {

    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `dostawcy` SET `NrDostawcy`=:nrs,'
                . '`Imie`=:imie,'
                . '`Nazwisko`=:nazw,'
                . '`Ulica`=:ul,'
                . '`NrDomu`=:nrDomu,'
                . '`KodPocztowy`=:kod,'
                . '`Miasto`=:miasto,'
                . '`NIP`=:NIP'
                . ' WHERE id=:id');
        $sth->bindParam(':id', $id);
    } else {
        $sth = $pdo->prepare('INSERT INTO `dostawcy` VALUES (NULL,:nrs, :imie,:nazw, :ul,:nrDomu,'
                . ':kod,:miasto,:NIP)');
    }
    $sth->bindParam(':nrs', $_POST['nrs']);
    $sth->bindParam(':imie', $_POST['imie']);
    $sth->bindParam(':nazw', $_POST['nazw']);
    $sth->bindParam(':ul', $_POST['ul']);
    $sth->bindParam(':nrDomu', $_POST['nrDomu']);
    $sth->bindParam(':kod', $_POST['kod']);
    $sth->bindParam(':miasto', $_POST['miasto']);
    $sth->bindParam(':NIP', $_POST['NIP']);
    $sth->execute();
    header('Location: ../../paneladmina.php#dostawcy');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM dostawcy WHERE id=:id');
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
        <link rel="stylesheet" href='loginstyle.css' type="text/css"/>

    </head>
    <body>
        <div class="container-fluid">
            <?php
            include $basicPath.'navbar.php';
            ?>
            <form method="POST" action="add.php" class="form-horizontal col-sm-offset-4">
                <?php
                if ($idGet > 0) {
                    echo '<input type="hidden" name="id" value="' . $idGet . '">';
                }
                ?>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nrk">Numer dostawcy: </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nrk" name="nrs" placeholder="Wprowadź numer dostawcy" <?php
                        if (isset($result['NrDostawcy'])) {
                                echo 'value="' . $result['NrDostawcy'] . '"';
                            }
                        ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="imie">Imię: </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="imie" name="imie" placeholder="Wprowadź imię" <?php
                       if (isset($result['Imie'])) {
                                echo 'value="' . $result['Imie'] . '"';
                            }
                        ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nazw">Nazwisko: </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nazw" name="nazw" placeholder="Wprowadź nazwisko" <?php
                      if (isset($result['Nazwisko'])) {
                                echo 'value="' . $result['Nazwisko'] . '"';
                            }
                        ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="ul">Ulica: </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="ul" name="ul" placeholder="Wprowadź ulicę" <?php
                       if (isset($result['Ulica'])) {
                                echo 'value="' . $result['Ulica'] . '"';
                            }
                        ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="nrDomu">Numer domu: </label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" id="nrDomu" name="nrDomu" placeholder="Wprowadź numer domu" <?php
                       if (isset($result['NrDomu'])) {
                                echo 'value="' . $result['NrDomu'] . '"';
                            }
                        ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="kod">Kod pocztowy: </label>
                    <div class="col-sm-3">
                        <input type="tekst" class="form-control" id="kod" name="kod" placeholder="Wprowadź kod pocztowy" <?php
                       if (isset($result['KodPocztowy'])) {
                                echo 'value="' . $result['KodPocztowy'] . '"';
                            }
                        ?>>
                    </div>
                </div>
                
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="miasto">Miasto: </label>
                    <div class="col-sm-3">
                        <input type="tekst" class="form-control" id="miasto" name="miasto" placeholder="Wprowadź miasto" <?php
                       if (isset($result['Miasto'])) {
                                echo 'value="' . $result['Miasto'] . '"';
                            }
                        ?>>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="control-label col-sm-2" for="NIP">NIP: </label>
                    <div class="col-sm-3">
                        <input type="tekst" class="form-control" id="NIP" name="NIP" placeholder="Wprowadź NIP" <?php
                        if (isset($result['NIP'])) {
                                echo 'value="' . $result['NIP'] . '"';
                            }
                        ?>>
                    </div>
                </div>
              
                 <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-3">
                            <input type="submit" class="btn btn-success" value="Zapisz">
                        <a href="../../paneladmina.php#dostawcy" class="btn btn-default" role="button">Powrót</a>
                        </div>
                 </div>
            </form>
            
            <div>
                <canvas id="canvas"/>
            </div>
        </div>
    </body>
</html>
<script>
    
    
</script>
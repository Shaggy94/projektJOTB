<?php
$basicPath = '../../';
include $basicPath.'header.php';
include $basicPath.'connection.php';

if (isset($_POST['nrs'])) {

    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `dostawcy` SET `Nrsprzedawcy`=:nrsp,'
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
        $sth = $pdo->prepare('INSERT INTO `dostawcy` VALUES (NULL,:nrsp, :imie,:nazw, :ul,:nrDomu,'
                . ':kod,:miasto,:NIP)');
    }
    $sth->bindParam(':nrsp', $_POST['nrsp']);
    $sth->bindParam(':imie', $_POST['imie']);
    $sth->bindParam(':nazw', $_POST['nazw']);
    $sth->bindParam(':ul', $_POST['ul']);
    $sth->bindParam(':nrDomu', $_POST['nrDomu']);
    $sth->bindParam(':kod', $_POST['kod']);
    $sth->bindParam(':miasto', $_POST['miasto']);
    $sth->bindParam(':NIP', $_POST['NIP']);
    $sth->execute();
    header('location: '.$basicPath.'paneladmina.php#dostawcy');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM sprzedawcy WHERE id=:id');
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
            <form method="POST" action="add.php">
                <?php
                if ($idGet > 0) {
                    echo '<input type="hidden" name="id" value="' . $idGet . '">';
                }
                ?>
                <table>
                    <tr>
                        <td>Nrumer Sprzedawcy: </td>
                        <td><input type="text" name="nrsp" <?php
                            if (isset($result['NrSprzedawcy'])) {
                                echo 'value="' . $result['NrSprzedawcy'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Imię: </td>
                        <td><input type="text" name="imie" <?php
                            if (isset($result['Imie'])) {
                                echo 'value="' . $result['Imie'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Nazwisko: </td>
                        <td><input type="text" name="nazw" <?php
                            if (isset($result['c'])) {
                                echo 'value="' . $result['Nazwisko'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Ulica: </td>
                        <td><input type="text" name="ul" <?php
                            if (isset($result['Ulica'])) {
                                echo 'value="' . $result['Ulica'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Numer Domu: </td>
                        <td><input type="number" name="nrDomu" <?php
                            if (isset($result['NrDomu'])) {
                                echo 'value="' . $result['NrDomu'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Kod Pocztowy: </td>
                        <td><input type="text" name="kod" <?php
                            if (isset($result['KodPocztowy'])) {
                                echo 'value="' . $result['KodPocztowy'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Miasto: </td>
                        <td><input type="text" name="miasto" <?php
                            if (isset($result['Miasto'])) {
                                echo 'value="' . $result['Miasto'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>NIP: </td>
                        <td><input type="text" name="NIP" <?php
                            if (isset($result['NIP'])) {
                                echo 'value="' . $result['NIP'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-success" value="Zapisz"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>

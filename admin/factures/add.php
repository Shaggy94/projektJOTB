<?php
$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';

if (isset($_POST['nrFakt'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `faktury` SET `NumerFaktury`=:nrFakt,'
                . '`DataWystawienia`=:dataWyst,'
                . '`Imie`=:imie,'
                . '`Nazwisko`=:nazwisko,'
                . '`Ulica`=:ulica,'
                . '`NumerDomu`=:nrDomu,'
                . '`KodPocztowy`=:kodPocz,'
                . '`Miasto`=:miasto,'
                . '`NIP`=:nip,'
                . '`Kraj`=:kraj'
                . ' WHERE id=:id');
        $sth->bindParam(':id', $id);
    } else {
        $sth = $pdo->prepare('INSERT INTO `faktury` VALUES (NULL, :nrFakt, :dataWyst, :imie, :nazwisko, :ulica,'
                . ':nrDomu, :kodPocz, :miasto, :nip, :kraj)');
    }
    $sth->bindParam(':nrFakt', $_POST['nrFakt']);
    $sth->bindParam(':dataWyst', $_POST['dataWyst']);
    $sth->bindParam(':imie', $_POST['imie']);
    $sth->bindParam(':nazwisko', $_POST['nazwisko']);
    $sth->bindParam(':ulica', $_POST['ulica']);
    $sth->bindParam(':nrDomu', $_POST['nrDomu']);
    $sth->bindParam(':kodPocz', $_POST['kodPocz']);
    $sth->bindParam(':miasto', $_POST['miasto']);
    $sth->bindParam(':nip', $_POST['nip']);
    $sth->bindParam(':kraj', $_POST['kraj']);
    $sth->execute();

    header('location: ../../paneladmina.php#faktury');
}
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
        <link rel="stylesheet" href='loginstyle.css' type="text/css"/>

    </head>
    <body>
        <div class="container-fluid">
            <?php
            include $basicPath . 'navbar.php';
            ?>
            <form method="POST" action="add.php">
                <?php
                if ($idGet > 0) {
                    echo '<input type="hidden" name="id" value="' . $idGet . '">';
                }
                ?>
                <table>
                    <tr>
                        <td>Numer faktury: </td>
                        <td><input type="number" name="nrFakt" id="nrFakt"<?php
                            if (isset($result['NumerFaktury'])) {
                                echo 'value="' . $result['NumerFaktury'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Data wystawienia: </td>
                        <td><input type="date" name="dataWyst" id="dataWyst"<?php
                            if (isset($result['DataWystawienia'])) {
                                echo 'value="' . $result['DataWystawienia'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Imie: </td>
                        <td><input type="text" name="imie" id="imie"<?php
                            if (isset($result['Imie'])) {
                                echo 'value="' . $result['Imie'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Nazwisko: </td>
                        <td><input type="text" name="nazwisko" id="nazwisko"<?php
                            if (isset($result['Nazwisko'])) {
                                echo 'value="' . $result['Nazwisko'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Ulica: </td>
                        <td><input type="text" name="ulica" id="ulica"<?php
                            if (isset($result['Ulica'])) {
                                echo 'value="' . $result['Ulica'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Numer domu: </td>
                        <td><input type="number" name="nrDomu" <?php
                            if (isset($result['NumerDomu'])) {
                                echo 'value="' . $result['NumerDomu'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Kod pocztowy: </td>
                        <td><input type="text" name="kodPocz" <?php
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
                        <td><input type="text" name="nip" <?php
                            if (isset($result['NIP'])) {
                                echo 'value="' . $result['NIP'] . '"';
                            }
                            ?>/></td>
                    </tr>
                    <tr>
                        <td>Kraj: </td>
                        <td><input type="text" name="kraj" <?php
                            if (isset($result['Kraj'])) {
                                echo 'value="' . $result['Kraj'] . '"';
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

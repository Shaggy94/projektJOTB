<?php
include '../../connection.php';

if (isset($_POST['nrs'])) {
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `dostawcy` SET `NrSprzedawcy`=:nrs,'
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

    header('location: providers.php');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM dostawcy WHERE id=:id');
    $sth->bindParam(':id', $idGet);
    $sth->execute();

    $result = $sth->fetch();
}
?>

<form method="post" action="add.php">

    <?php
    if ($idGet > 0) {
        echo '<input type="hidden" name="id" value="' . $idGet . '">';
    }
    ?>

    Nrumer Sprzedawcy: <input type="text" name="nrs" <?php
    if (isset($result['NrSprzedawcy'])) {
        echo 'value="' . $result['NrSprzedawcy'] . '"';
    }
    ?>/><br><br>
    Imię: <input type="text" name="imie" <?php
    if (isset($result['Imie'])) {
        echo 'value="' . $result['Imie'] . '"';
    }
    ?>/><br><br>
    Nazwisko: <input type="text" name="nazw" <?php
    if (isset($result['c'])) {
        echo 'value="' . $result['Nazwisko'] . '"';
    }
    ?>/><br><br>
    Ulica: <input type="text" name="ul" <?php
    if (isset($result['Ulica'])) {
        echo 'value="' . $result['Ulica'] . '"';
    }
    ?>/><br><br>
    Numer Domu: <input type="number" name="nrDomu" <?php
    if (isset($result['NrDomu'])) {
        echo 'value="' . $result['NrDomu'] . '"';
    }
    ?>/><br><br>
    Kod Pocztowy: <input type="text" name="kod" <?php
    if (isset($result['KodPocztowy'])) {
        echo 'value="' . $result['KodPocztowy'] . '"';
    }
    ?>/><br><br>
    Miasto: <input type="text" name="miasto" <?php
    if (isset($result['Miasto'])) {
        echo 'value="' . $result['Miasto'] . '"';
    }
    ?>/><br><br>
    NIP: <input type="text" name="NIP" <?php
    if (isset($result['NIP'])) {
        echo 'value="' . $result['NIP'] . '"';
    }
    ?>/><br><br>
    <input type="submit" value="Zapisz" />

</form>



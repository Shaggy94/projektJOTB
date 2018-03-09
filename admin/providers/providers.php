<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location: ../../index.php');
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Płatności</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </head>
    <body>
        <?php
        include '../../connection.php';

        $tbl = $pdo->query('SELECT * FROM `dostawcy`');
        echo '<br><a href="../../wyloguj.php">Wyloguj</a><br>';
        echo '<br><a href="add.php">dodaj dostawcę</a><br>'
        . '<table class="table table-striped">'
        . '<tr>'
        . '<th>ID</th>'
        . '<th>Numer Sprzedawcy</th>'
        . '<th>Imię</th>'
        . '<th>Nazwisko</th>'
        . '<th>Ulica</th>'
        . '<th>Nr Domu</th>'
        . '<th>Kod Pocztowy</th>'
        . '<th>Miasto</th>'
        . '<th>NIP</th>'
        . '<th>Opcje</th>';
        echo'</tr>';
        foreach ($tbl->fetchAll() as $value) {
            echo '<tr>'
            . '<th>' . $value['ID'] . '</th>'
            . '<th>' . $value['NrSprzedawcy'] . '</th>'
            . '<th>' . $value['Imie'] . '</th>'
            . '<th>' . $value['Nazwisko'] . '</th>'
            . '<th>' . $value['Ulica'] . '</th>'
            . '<th>' . $value['NrDomu'] . '</th>'
            . '<th>' . $value['KodPocztowy'] . '</th>'
            . '<th>' . $value['Miasto'] . '</th>'
            . '<th>' . $value['NIP'] . '</th>'
            . '<th><a href="usun.php?id=' . $value['ID'] .
            '">Usuń</a> | <a href="add.php?id=' . $value['ID'] . '">Edytuj</a></th></tr>';
        }
        echo '</table>';
        ?>
        <a href="../../index.php">Strona głowna</a>
    </body>
</html>

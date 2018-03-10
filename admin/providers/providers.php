<?php

$tbl = $pdo->query('SELECT * FROM `dostawcy`');

echo '<br><a href="admin/providers/add.php" class="btn btn-success" role="button">dodaj dostawcę</a><br>'
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
    . '<th><a href="admin/providers/usun.php?id=' . $value['ID'] .
    '" class="btn btn-danger" role="button" >Usuń</a><a href="admin/providers/add.php?id='
    . $value['ID'] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
}
echo '</table>';

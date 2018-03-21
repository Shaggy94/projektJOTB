<?php

$tbl = $pdo->query('SELECT p.ID,p.Nazwa,p.VAT,p.CenaNetto,p.Opis,d.Imie,d.Nazwisko, p.EAN13 FROM `produkty` as p, dostawcy as d WHERE d.ID=p.IDDostawcy');

echo '<br><a href="admin/products/add.php" class="btn btn-success" role="button">dodaj produkt</a><br>'
 . '<table class="table table-striped">'
 . '<tr>'
 . '<th>ID</th>'
 . '<th>Nazwa</th>'
 . '<th>VAT</th>'
 . '<th>Cenna netto</th>'
 . '<th>Opis</th>'
 . '<th>Imię dostawcy</th>'
 . '<th>Nazwisko dostawcy</th>'
 . '<th>EAN-13</th>'
 . '<th>Opcje</th>';
echo'</tr>';
foreach ($tbl->fetchAll() as $value) {
    echo '<tr>'
    . '<td>' . $value['ID'] . '</td>'
    . '<td>' . $value['Nazwa'] . '</td>'
    . '<td>' . $value['VAT'] . '</td>'
    . '<td>' . $value['CenaNetto'] . '</td>'
    . '<td>' . $value['Opis'] . '</td>'
    . '<td>' . $value['Imie'] . '</td>'
    . '<td>' . $value['Nazwisko'] . '</td>'
    . '<td>' . $value['EAN13'] . '</td>'
    . '<th><a href="admin/products/usun.php?id=' . $value['ID'] .
    '" class="btn btn-danger" role="button" >Usuń</a>'
    . '<a href="admin/products/add.php?id='
    . $value["ID"] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
}
echo '</table>';
?>
<?php
$tbl = $pdo->query('SELECT * FROM `zamowienia`');

echo '<br><a href="admin/orders/add.php" class="btn btn-success" role="button">Dodaj zamówienie</a><br>'
 . '<table class="table table-striped">'
 . '<tr>'
 . '<th>ID</th>'
 . '<th>Numer Zamówienia</th>'
 . '<th>Data Sprzedaży</th>'
 . '<th>ID Faktury</th>'
 . '<th>ID Klienta</th>'
 . '<th>ID Sprzedawcy</th>'
 . '<th>Opcje</th>';
echo'</tr>';
foreach ($tbl->fetchAll() as $value) {
    echo '<tr>'
    . '<th>' . $value['ID'] . '</th>'
    . '<th>' . $value['NumerZamowienia'] . '</th>'
    . '<th>' . $value['DataSprzedazy'] . '</th>'
    . '<th>' . $value['IDFaktury'] . '</th>'
    . '<th>' . $value['IDKlienta'] . '</th>'
    . '<th>' . $value['IDSprzedawcy'] . '</th>'
    . '<th><a href="admin/orders/usun.php?id=' . $value['ID'] .
    '" class="btn btn-danger" role="button" >Usuń</a>'
    . '<a href="admin/orders/add.php?id='
    . $value["ID"] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
}
echo '</table>';
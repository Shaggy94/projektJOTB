<?php

$tbl = $pdo->query('SELECT z.ID,z.NumerZamowienia,z.DataSprzedazy, f.NumerFaktury, k.Imie as kImie,k.Nazwisko as kNazw,s.Imie as sImie,s.Nazwisko as sNazw'
        . ' FROM `zamowienia` as z, faktury as f, klienci as k, sprzedawcy as s WHERE'
        . ' z.IDFaktury=f.ID and z.IDKlienta=k.ID and z.IDSprzedawcy=s.ID');

echo '<br><a href="admin/orders/add.php" class="btn btn-success" role="button">Dodaj zamówienie</a><br>'
 . '<table class="table table-striped">'
 . '<tr>'
 . '<th>ID</th>'
 . '<th>Numer Zamówienia</th>'
 . '<th>Data Sprzedaży</th>'
 . '<th>Numer Faktury</th>'
 . '<th>Nazwisko Klienta</th>'
 . '<th>Imię Klienta</th>'
 . '<th>Nazwisko Sprzedawcy</th>'
 . '<th>Imię Sprzedawcy</th>'
 . '<th>Opcje</th>';
echo'</tr>';
foreach ($tbl->fetchAll() as $value) {
    echo '<tr>'
    . '<th>' . $value['ID'] . '</th>'
    . '<th>' . $value['NumerZamowienia'] . '</th>'
    . '<th>' . $value['DataSprzedazy'] . '</th>'
    . '<th>' . $value['NumerFaktury'] . '</th>'
    . '<th>' . $value['kNazw'] . '</th>'
    . '<th>' . $value['kImie'] . '</th>'
    . '<th>' . $value['sNazw'] . '</th>'
    . '<th>' . $value['sImie'] . '</th>'
    . '<th><a href="admin/orders/usun.php?id=' . $value['ID'] .
    '" class="btn btn-danger" role="button" >Usuń</a>'
    . '<a href="admin/orders/add.php?id='
    . $value["ID"] . '" class="btn btn-info" role="button">Edytuj</a></th></tr>';
}
echo '</table>';

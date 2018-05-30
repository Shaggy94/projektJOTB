<?php
$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';


$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($id>0){
  $positions=$pdo->prepare('SELECT p.Nazwa, pz.Ilosc, pz.Rabat, pz.CenaBrutto FROM pozycjazamowienia as pz, produkty as p WHERE pz.IDZamowienia=:id and pz.IdProduktu = p.ID');
  $positions->bindParam(':id',$id);
  $positions->execute();

  $zamowienie=$pdo->prepare('SELECT z.ID,z.NumerZamowienia,z.DataSprzedazy,f.NumerFaktury,k.Imie as ImieKlienta,k.Nazwisko as NazwiskoKlienta,s.Imie as ImieSprzedawcy,s.Nazwisko as NazwiskoSprzedawcy FROM zamowienia as z,faktury as f,klienci as k, sprzedawcy as s WHERE z.ID=:id and f.id=z.IDFaktury and k.id=z.IDKlienta and s.id=z.IDSprzedawcy');
  $zamowienie->bindParam(':id',$id);
  $zamowienie->execute();
  $zam=$zamowienie->fetch();

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
          <?php include '../../navbar.php'; ?>
          <div class="col-sm-4">
            <p>Dane faktury:</p>
            <table class="table">

          <?php

          echo '<tr><td>ID zamówienia</td><td>'.$zam['ID'].'</td></tr>
          <tr><td>Data sprzedaży</td><td>'.$zam['DataSprzedazy'].'</td></tr>
          <tr><td>Numer faktury</td><td>'.$zam['NumerFaktury'].'</td></tr>
          <tr><td>Klient</td><td>'.$zam['ImieKlienta'].' '.$zam['NazwiskoKlienta'].'</td></tr>
          <tr><td>Sprzedawca</td><td>'.$zam['ImieSprzedawcy'].' '.$zam['NazwiskoSprzedawcy'].'</td></tr>';
           ?>
           </table>
        </div>

        <div class="col-sm-4">
          <p>Produkty:</p>
          <table class="table">
            <tr><th>Nazwa produktu</th><th>Ilość</th><th>Rabat</th><th>Cena brutto</th></tr>
        <?php
        foreach ($positions as $val) {
          echo '<tr><td>'.$val['Nazwa'].'</td><td>'.$val['Ilosc'].'</td><td>'
          .$val['Rabat'].'</td><td>'.$val['CenaBrutto'].'</td></tr>';
        }

         ?>
         </table>
      </div>
      </div>
    </body>
</html>

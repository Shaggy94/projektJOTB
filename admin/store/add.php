<?php
$basicPath = '../../';
include $basicPath . 'header.php';
include $basicPath . 'connection.php';

$get = $pdo->query('SELECT ID,Nazwa FROM produkty ORDER BY Nazwa');

if (isset($_POST['produkt'])) {
    
    $id = isset($_POST['id']) ? intval($_POST['id']) : 0;


    if ($id > 0) {
        $sth = $pdo->prepare('UPDATE `magazyn` SET `IDProduktu`=:idProd,'
                . '`Ilosc`=:Ilosc'
                . ' WHERE ID=:id');
        $sth->bindParam(':id', $id);
    } else {
        $sth = $pdo->prepare('INSERT INTO magazyn VALUES (NULL, :idProd, :Ilosc)');
    }
    $sth->bindParam(':idProd', $_POST['produkt']);
    $sth->bindParam(':Ilosc', $_POST['Ilosc']); //here <--
    $sth->execute();
    header('Location: ' . $basicPath . 'paneladmina.php#magazyn');
}
$idGet = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($idGet > 0) {
    $sth = $pdo->prepare('SELECT * FROM `magazyn` WHERE ID=:id');
    $sth->bindParam(':id', $idGet);
    $sth->execute();

    $result = $sth->fetch();
    
    $str=$pdo->prepare('SELECT * FROM `produkty` WHERE id=:id');
    $str->bindParam(':id',$result['IDProduktu']);
    $str->execute();
    
    $prodName=$str->fetch();
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
                        <td>Produkt: </td>
                        <td><select name="produkt">
                                <?php
                                echo '<option value="' . $prodName['ID'] . '">' . $prodName['Nazwa'] . '</option>';
                                foreach ($get->fetchAll() as $products) {
                                    echo '<option value="' . $products['ID'] . '">' . $products['Nazwa'] . '</option>';
                                }
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Ilosc Produktow: </td>
                        <td><input type="number" name="Ilosc" <?php
                            if (isset($result['Ilosc'])) {
                                echo 'value="' . $result['Ilosc'] . '"';
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
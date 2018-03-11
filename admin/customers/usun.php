<?php

$basicPath = '../../';
include $basicPath.'header.php';
include $basicPath.'connection.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sth = $pdo->prepare('DELETE FROM klienci WHERE id=:id');
    $sth->bindParam(':id', $id);
    $sth->execute();
    
    header('location: '.$basicPath.'paneladmina.php#klienci');
}else{
    header('location: '.$basicPath.'paneladmina.php#klienci');
}

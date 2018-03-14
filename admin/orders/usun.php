<?php

$basicPath = '../../';
include $basicPath.'header.php';
include $basicPath.'connection.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sth = $pdo->prepare('DELETE FROM zamowienia WHERE id=:id');
    $sth->bindParam(':id', $id);
    $sth->execute();
    
    header('location: '.$basicPath.'paneladmina.php#zamowienia');
}else{
    header('location: '.$basicPath.'paneladmina.php#zamowienia');
}

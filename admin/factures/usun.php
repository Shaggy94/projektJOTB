<?php
$basicPath = '../../';
include $basicPath.'header.php';
include $basicPath.'connection.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sth = $pdo->prepare('DELETE FROM faktury WHERE id=:id');
    $sth->bindParam(':id', $id);
    $sth->execute();
    
    header('location: '.$basicPath.'paneladmina.php#faktury');
}else{
    header('location: '.$basicPath.'paneladmina.php#faktury');
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


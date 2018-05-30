<?php
	session_start();
	header("Content-type: text/xml");
	header ( "Content-Disposition: attachment; filename=raport.xml" );
	$file = $_SESSION['file'];
	echo $file;
?>
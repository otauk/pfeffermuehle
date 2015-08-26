<?php
try {

	$db = new PDO('mysql:host=localhost;dbname=pfeffermuehle;charset=utf8', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

}
catch (PDOException $e) {
	echo $e->getMessage();
	}



?>
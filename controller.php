<?php
	$database_username = 'root';
	$database_password = 'newpwd';
	try{

	$pdo_x = new PDO( 'mysql:host=localhost;dbname=Users', $database_username, $database_password );
	$pdo_x->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
    // More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch(PDOException $e) {
    echo $e->getMessage();
}


?>


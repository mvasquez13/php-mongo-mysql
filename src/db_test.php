<?php


$hostname	= getenv("MYSQL_HOSTNAME");
$dbname		= getenv("MYSQL_DATABASE");
$username	= getenv("MYSQL_USER");
$password	= getenv("MYSQL_PASSWORD");


$mongohostname	= getenv("MONGO_HOSTNAME");
$mongousername	= getenv("MONGO_INITDB_ROOT_USERNAME");
$mongopassword	= getenv("MONGO_INITDB_ROOT_PASSWORD");
$mongodb	= getenv("MONGO_DATABASE");


try {

	$conn = new PDO( "mysql:host=$hostname;dbname=$dbname", $username, $password );

	// Configure PDO error mode
	$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo "Connected successfully to MySql database $dbname <br/>";



	// echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";

	$client = new MongoDB\Driver\Manager("mongodb://$mongousername:$mongopassword@$mongohostname");
	echo "Connected successfully to MongoDB database $mongodb";
	// var_dump($client);
	// $db = $client->test;

}
catch( PDOException $e ) {

	echo "Failed to connect: " . $e->getMessage();
}

// Perform database operations

// Close the connection
$conn = null;
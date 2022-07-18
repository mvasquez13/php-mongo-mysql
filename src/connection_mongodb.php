<?php

$MONGO_HOSTNAME=getenv("MONGO_HOSTNAME");
$MONGO_INITDB_ROOT_USERNAME=getenv("MONGO_ROOT_USER");
$MONGO_INITDB_ROOT_PASSWORD=getenv("MONGO_ROOT_PASSWORD");
$MONGO_DATABASE=getenv("MONGO_DATABASE");

try{
    $client_mongodb = new MongoDB\Driver\Manager("mongodb://$MONGO_INITDB_ROOT_USERNAME:$MONGO_INITDB_ROOT_PASSWORD@$MONGO_HOSTNAME");
} catch (MongoDB\Driver\Exception\AuthenticationException $e) {
    echo "Exception 1:", $e->getMessage(), "\n";
} catch (MongoDB\Driver\Exception\ConnectionException $e) {

    echo "Exception 2:", $e->getMessage(), "\n";
} catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e) {

    echo "Exception 3:", $e->getMessage(), "\n";
}


?>
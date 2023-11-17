<?php

include 'constants.php';

try {
    $DbConn = new PDO("mysql:host=$hostName;port=3307;dbname=$dbName", $dbUser, $dbPassword);
    $DbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die(); // Add this line to stop script execution if the connection fails
}

?>
<?php
$configContent = file_get_contents('config.json');
$configData = json_decode($configContent, true);

$Key_Id = $configData["Key_Id"];
$Key_Secret = $configData["Key_Secret"];
$displayCurrency = $configData["displayCurrency"];
$dbname = $configData["dbname"];
$dbuser = $configData["dbuser"];
$dbpass = $configData["dbpass"];
$dbhost = $configData["dbhost"];

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>

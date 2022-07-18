<?php

/**
 * using mysqli_connect for database connection
 */

$databaseHost = '114.134.65.82';
$databaseName = 'office';
$databaseUsername = 'admin';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

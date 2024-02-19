<?php

@session_start();

error_reporting(E_ERROR | E_PARSE);

// Database
$arrConfig["serverName"] = "localhost";
$arrConfig["dbUsername"] = "root";
$arrConfig["dbPassword"] = "";
$arrConfig["databaseName"] = "booksorterdb";

$arrConfig["webName"] = "Bookappthing";

include_once "database.php";
include_once "book.php";
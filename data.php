<?php

@session_start();

error_reporting(E_ERROR | E_PARSE);

// Database
include "secret.php";

$arrConfig["webName"] = "Bookappthing";

$data["languages"] = ["pt" => "Português", "gb" => "Inglês", "es" => "Espanhol", "fr" => "Francês", "de" => "Alemão", "it" => "Italiano", "nl" => "Holandês", "ru" => "Russo", "cn" => "Chinês", "jp" => "Japonês", "sa" => "Árabe", "my" => "Malaio", "id" => "Indonésio", "kr" => "Coreano", "tr" => "Turco", "il" => "Hebraico", "pl" => "Polaco", "cz" => "Checo", "hu" => "Húngaro", "ro" => "Romeno", "gr" => "Grego", "other" => "Outro"];
$data["status"] = ["Lista de leitura", "Lido", "A ler", "Leitura parada", "Emprestado", "Leitura desistida", "Perdido", "Vendido", "Outro"];

include_once "database.php";
include_once "book.php";
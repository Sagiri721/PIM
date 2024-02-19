<?php

$arrConfig["connection"] = mysqli_connect(
    $arrConfig["serverName"], 
    $arrConfig["dbUsername"], 
    $arrConfig["dbPassword"], 
    $arrConfig["databaseName"]
);

function RunQuery($sql){

	global $arrConfig;
	if($debug) echo $sql;
	$result = $arrConfig['connection']->query($sql);
	
	if(isset($result->num_rows)) { // SELECT
		$arrRes = array();
		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {
		        $arrRes[] = $row;
		    }
		}
		return $arrRes;
	}
	else if ($result === TRUE) { // INSERT, DELETE, UPDATE
		if($last_id = $arrConfig['connection']->insert_id) {
			return $last_id;
		}
		return 1;
	} 
	return 0;
}

function AreCredentialRight($username, $password, $arrConfig) {

    $sql = "SELECT * FROM people WHERE name='" . $username . "'";
    $result = mysqli_query($arrConfig["connection"], $sql);

    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0){

        while ($row = mysqli_fetch_assoc($result)) {
            
            if($row["name"] == $username && password_verify($password, $row["password"])) return true;
            else return false;
        }
        return true;
    }else{

        return false;
    }
}
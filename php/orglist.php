<?php

/* Define server and DB*/
/*define ("DB_HOST", "u345295.mysql.masterhost.ru");
define ("DB_LOGIN", "u345295");
define ("DB_PASS", "unch24aropped");*/
define ("DB_NAME", "u345295_metrotun");

define ("DB_HOST", "localhost");
define ("DB_LOGIN", "root");
define ("DB_PASS", "");

/*Connect ot DB*/
$con = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);

/*if(!$con){
	die("connection failure".mysqli_connect_error());
}

/* Get ID company from front-page*/
$request = $_POST["method"];

if($request == "get"){

	mysqli_set_charset($con, 'utf8');

	$sql = "SELECT `MEMBERNAME`, `REESTR_NUM` FROM `es_metrotunnel_list` WHERE `AGENTSTATUSE`='Член СРО' ORDER BY `MEMBERNAME`";

	/*Query to database*/
	$res = mysqli_query($con, $sql);

	$data = array();

	/*Add strings to array*/
	if($res->num_rows > 0){
		while ($row = $res->fetch_assoc()){
			$row['MEMBERNAME'] = str_replace('"', '', $row['MEMBERNAME']); /* Remove extra quotes*/
			$row_n = array(
			'MEMBERNAME' => $row['MEMBERNAME']
			);
			$data[] = $row_n;
		}
	}
}

/*Output encoded JSON data*/
print json_encode($data);

?>
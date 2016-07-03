<?php
    $base = "../../";
    require_once($base."functions.php");
    $returndata = array();
    header('Content-type: text/html; charset=UTF-8');
    // longitude, latitude or userId
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in");}
   
	$query="select word from history where uid = '".$uid."'";
	$result=mysql_query($query);
	if(!$result){
		add_return_data(0, 4, "Fatal Error");
	}
	$data=array();
    while($row=mysql_fetch_array($result)){
		array_push($data,$row);
	}
   
    $returndata["data"] = $data;
    add_return_data(1, 1,"Success");

?>
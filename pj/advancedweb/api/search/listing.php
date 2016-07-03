<?php
    $base = "../../";
    require_once($base."functions.php");
    $returndata = array();
    header('Content-type: text/html; charset=UTF-8');
    // longitude, latitude or userId
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in")}
    if(!isset($_POST["type"])){add_return_data(0, 2, "type needed.");}
    $type = $_POST["type"];
    if(!$type){add_return_data(0, 2, "type is needed");}
	$query="select places.pid as pid,places.pname as pname,places.type as type from places,".$type." where uid = '".$uid."'";
	$result=mysql_query($query);
	if(!$result){
		add_return_data(0, 4, "Fatal Error");
	}
	$data=array();
    while($row=mysql_fetch_array){
		array_push($data,$row);
	}
   
    $returndata["data"] = $data;
    add_return_data(1, 1,"Success");

?>
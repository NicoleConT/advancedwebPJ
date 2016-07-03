<?php
    $base = "../../";
    require_once($base."functions.php");
    $returndata = array();
    header('Content-type: text/html; charset=UTF-8');
    // longitude, latitude or userId
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in");}
	$place=new Place();
	$result=$place->getAllPlaces();
	if(!$result){add_return_data(0,2,"An error occured:".mysql_error());}
	$returndata["data"]=$result;
	add_return_data(1,1,"Got data");
	

?>
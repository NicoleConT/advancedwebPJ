<?php
	
     $base = "../../";
    require_once($base."functions.php");
    $returndata = array();
    header('Content-type: text/html; charset=UTF-8');
    // longitude, latitude or userId
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in");}
    if(!isset($_POST["rating"]) || !$_POST["rating"]){add_return_data(0, 5,"Rating is a must.");}
    $rating = $_POST["rating"];
    if(!isset($_POST["pid"]) || !$_POST["pid"]){add_return_data(0, 6,"pid is a must.");}
    $pid = $_POST["pid"];
	$query="insert into rating (uid,pid,rating) values ('".$uid."',".$pid.",".$rating.")";
	$result=mysql_query($query);
    
	
	if(!$result){add_return_data(0, 7,"Error while rating.");}
    add_return_data(1, 1, "Rating Added.");

?>
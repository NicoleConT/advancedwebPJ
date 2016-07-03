<?php
    $base = "../../";
    require_once($base."functions.php");
    $returndata = array();
    header('Content-type: text/html; charset=UTF-8');
    // longitude, latitude or userId
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in");}
    if(!isset($_POST["q"])){add_return_data(0, 2, "query needed.");}
    $q = $_POST["q"];
    if(!$q){add_return_data(0, 2, "query is needed");}
	$query="select * from places where pname like '%".$q."%'";
	$result=mysql_query($query);
	if(!$result){
		add_return_data(0, 4, "Fatal Error");
	}
	$data=array();
    while($row=mysql_fetch_array($result)){
		array_push($data,$row);
	}
    $iquery="insert into history(uid,word) values ('".$uid."','".$q."')";
	$result=mysql_query($iquery);
    $returndata["data"] = $data;
    add_return_data(1, 1,"Success");

?>
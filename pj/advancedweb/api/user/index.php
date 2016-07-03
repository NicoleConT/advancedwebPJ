<?php
    $base = "../../";
    require_once($base."functions.php");
    header('Content-type: text/html; charset=UTF-8');

    
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in");}
	$query="select uid,profile from user where uid = '".$uid."'";
	$result=mysql_query($query);
	if(!$result){
		add_return_data(0,4,"Fatal error");
	}
	while($row=mysql_fetch_array($result)){
		$returndata["data"]=$row;
	}
	
   
    add_return_data(1, 1, "Success");
?>
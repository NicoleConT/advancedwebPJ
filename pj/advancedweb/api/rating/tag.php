<?php
	
     $base = "../../";
    require_once($base."functions.php");
    $returndata = array();
    header('Content-type: text/html; charset=UTF-8');
    // longitude, latitude or userId
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in");}
    if(!isset($_POST["tag"]) || !$_POST["tag"]){add_return_data(0, 5,"Tag is a must.");}
    $tag = $_POST["tag"];
    if(!isset($_POST["pid"]) || !$_POST["pid"]){add_return_data(0, 6,"pid is a must.");}
    $pid = $_POST["pid"];
	 if(!isset($_POST["type"]) || !$_POST["type"]){add_return_data(0, 6,"pid is a must.");}
    $type = $_POST["type"];
	if($type=="good"){
		$fld="tag";
	}
	else {
		$fld="tag0";
	}
	
	$query="select ".$fld." from places where pid =".$pid;
	
	
	$returndata["query"]=$query;
	$result=mysql_query($query);
	
	if(!$result){add_return_data(0,7,"Error adding tags ".mysql_error());}
	while($row=mysql_fetch_array($result)){
		$alltag=$row[$fld];
	}
	if(!$alltag){$alltag="";};
	$query="update places set ".$fld."='".$alltag."#".$tag."' where pid=".$pid;
	$result=mysql_query($query);
	
	
	
    
	
	if(!$result){add_return_data(0, 7,"Error adding tag.");}
    add_return_data(1, 1, "Tag Added.");

?>
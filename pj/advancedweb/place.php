<?php
require_once("functions.php");

    if(!isset($base)){
        render_404page();
    }
	
	Class Place{
		var $place;
		function __construct($pid=null){
			
			if(!$pid)return true;
			
			$query1="select * from places where `pid`=".$pid.";";
			$query2="select rating, count(uid) as total from rating where `pid`=".$pid." group by rating;";
			
			$result1=mysql_query($query1);
			$result2=mysql_query($query2);
			
			if(!$result1)return false;
			while($row=mysql_fetch_array($result1)){
				$this->place=$row;
			}
			if($result2){
				$this->place["rating"]=$this->makeRatingData($result2);
			}
			
			
		}
		
		function makeRatingData($result){
			$newdata=array();
			while($row=mysql_fetch_array($result)){
				$tempkey=0;
				$tempval=0;
				foreach($row as $colname=>$val){
					if($colname=="rating")$tempkey=$val;
					if($colname=="total")$tempval=$val;
				}
				$newdata[$tempkey]=$tempval;
				
			}
			return $newdata;
		}
		
		function getResources($result){
			$newdata=array();
			while($row=mysql_fetch_array($result)){
				array_push($newdata,$row);
			}
		}
		
		function getAllPlaces(){
			$query="select * from places";
			$placedata=array();
			$result=mysql_query($query);
			
			if(!$result)return false;
			while($row=mysql_fetch_array($result)){
				array_push($placedata,$row);
			}
			return $placedata;
		}
		
		
		//New one
		
	}
	
?>
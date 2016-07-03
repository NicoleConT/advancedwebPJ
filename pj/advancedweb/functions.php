<?php
    function render_404page(){
        add_return_data(0, 1, "Page Not Found");
    }
    if(!isset($base)){render_404page();}
    require_once($base."connect.ini.php");
    require_once($base."loginCheck.php");
	require_once($base."place.php");
    require_once($base."profileImage.php");

    function invalid_data($data){
        echo("Invalid ".$data);
        die("");
    }
    function getCookies($uname){
        $secret = "This is cookie secret. ";
        $secret = $secret.$uname;
        return hash("sha1", $secret);
    }
    function checkCookies($uname, $cookiehash){
        $ha = getCookies($uname);
        if($ha == $cookiehash){
            return true;
        }
        return false;
    }
    $returndata = array();
    function add_return_data($success, $msgid, $msg){
        global $returndata;
        $returndata["success"] = $success;
        $returndata["msgid"] = $msgid;
        $returndata["msg"] = $msg;
        echo json_encode($returndata, JSON_UNESCAPED_UNICODE);
        die("");
    }
    
    
    function insertComma($st, $st1){
        if(!$st){return $st1;}
        if(!$st1){return $st;}
        return $st.", ".$st1;
    }

    function getUserPic($picId){
        return "/advancedweb/pics/profilePic/".$picId;
    }
    function getItemPic($fname){
        return "/advancedweb/pics/itemPic/".$fname;
    }
	
	function getString($data){
		$result="{";
		foreach($data as $key=>$value){
			$result=$result.$key.":".$value.",";
		}
		return $result."}";
	}
?>
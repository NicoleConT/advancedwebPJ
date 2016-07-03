<?php
    $base = "../../";
    require_once($base."users.php");
    $returndata = array();
    //uname, password
    if(!isset($_POST['uid']) || !isset($_POST['pword'])){
        add_return_data(0, 2, "Both Username and Password need to be posted.");
    }
    else{
        $uid = $_POST['uid'];
        $pword = $_POST['pword'];
        
        $query="select * from user where uid='".$uid."' and pword='".$pword."'";
		$result=mysql_query($query);
		
		
		if(!$result || mysql_num_rows($result)<1){
			add_return_data(0,1,"Wrong username or password ");
		}
		
        $cookies = array("uid"=> $uid);
        $returndata["cookies"] = $cookies;
		
        add_return_data(1, 1, "Logged In!");
        
    }
?>
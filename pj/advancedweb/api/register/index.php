<?php
    $base = "../../";
    require_once($base."functions.php");
    $returndata = array();
    $uid = "";
    $pword = "";
    
    //uname, password, email , (gender, fname, contact)
	$returndata["data"]=$_POST;
    if(!isset($_POST["uid"])){add_return_data(0, 3, "Username required");}
    $uid = $_POST["uid"];
    if(!$uid){add_return_data(0, 3, "Username required");}
    if(!isset($_POST["pword"])){add_return_data(0, 4, "Password required");}
    $pword = $_POST["pword"];
    if(!$pword){add_return_data(0, 4, "Password required");}
   
   
    $data = array("uid" => $uid,
                  "pword"=>$pword
                  
                  );
    $query="insert into user (uid, pword) values ('".$uid."','".$pword."');";
	$useId=mysql_query($query);
    
    if($useId){
        $picId = uploadPic("profilePic", $uid, "userFace");
        if($picId){
           
			$query="update user set profile='".$picId."' where uid='".$uid."';";
			$pic_update=mysql_query($query);
            if($pic_update)add_return_data(1, 1, "User successfully created");
			$pic_err=mysql_error();
            
        }
        add_return_data(1, 2, "User successfully created but picture cannot be added.".$pic_err);
    }
	else {
		add_return_data(0,5,"Failed to create user".mysql_error());
	}



?>
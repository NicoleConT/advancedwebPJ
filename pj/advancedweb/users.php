<?php
    require_once("functions.php");
    if(!isset($base)){
        render_404page();
    }
    Class User{
            var $user;
            function __construct($uid=null, $data = array()){
                $this->user = $data;
                if($username){
                    $this->user["uid"] = $username;
                    $this->getuser(); //Get user from mysql.
                }
            }
            function checklogin($username, $password){
                //check username and password
                if($this->user['passhash'] == $this->get_pass_hash($username, $password)){return true;}
                return false;
            }
            function getuser(){
                //get user from the database

                $colsArray = array("users"=>array(1,2,3,4,5,6,7,8));
                $colStr = getSqlColumns($colsArray);
                $query = "SELECT * FROM `users` WHERE `uname`='".$this->user["uname"]."';";
                $result = mysql_query($query);
                if(!$result){
                    return false;
                }
                while($row = mysql_fetch_array($result)){
                    //Get Data in here
                    $this->user = getSqlData($colsArray, $row);
                    return true;
                }
            }
            function insert($data){
                //
                $data = $this->get_sql_format_data($data);
                $uid = $data['uid'];
                $pword = $data['pword'];

                $query = "INSERT INTO `users` (`uid`, `pword`) VALUES ('$uid', '$pword');";
                $result = mysql_query($query);
                if(!$result){return false;}
                return mysql_insert_id();

            }
            function get_sql_format_data($data){
                //Check all the data if it is in sql format and return an object.
                $newdata = array();
                //gender
                if($data["gender"] == "male"){$newdata["gender"] = 1;}
                else if($data["gender"] == "female"){$newdata["gender"] = 2;}
                else{$newdata["gender"] = 3;}
                //passhash
                if($this->check_username($data["uname"])){
                    $newdata["uname"] = $data["uname"];
                }
                if($newdata["uname"] && $data["password"]){
                    $newdata["passhash"]=$this->get_pass_hash($newdata["uname"], $data["password"]);
                }
                //Fullname
               
                //Get the right format of the role.
                $newdata["role"] = $this->get_sql_role($data["role"]);
                $newdata["pic"] = "0.jpg";
                return $newdata;

            }

            function check_username($username){
                //Check if username format is correct;
                if($username){return true;}
                return false;
            }
            
            function get_user_data(){
                $newdata = array();
                foreach ($this->user as $key => $value){
                    if($key != "pword"){
                        $newdata[$key] = $value;
                    }
                }
                return $newdata;
            }
            function get_userid(){
                return $this->user["uid"];
            }
            function updateProfileImage($uid, $imgId){
                $query = "UPDATE `users` SET `pic`='$imgId' WHERE `uid`=$uid;";
                if(mysql_query($query)){return true;}
                return false;
            }
    }
    
?>
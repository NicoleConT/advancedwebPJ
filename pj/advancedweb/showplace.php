<?php
	 $base = "/";
    require_once($base."functions.php");
	if(!isset($_COOKIE["uid"])){add_return_data(0,3,"not logged in");}
	$uid=$_COOKIE["uid"];
	if(!$uid){add_return_data(0,3,"not logged in");}
	if(!isset($_GET["pid"])){add_return_data(0,2,"No pid");}
	$pid=$_GET["pid"];
	if(!$pid){add_return_data(0,2,"No pid");}
	$newplace=(new Place($pid));
	$place=$newplace->place;
	
	function getRating($ratingData,$num){
		if(!isset($ratingData[$num]))return 0;
		$rat=$ratingData[$num];
		if(!$rat)return 0;
		return $rat;
	}
	

?>
<!DOCTYPE html>  
<html>  
<head>  
<meta charset="utf-8"/>  
<title>Location info</title>  
<style type="text/css"> html{height:100%} body{height:100%;margin-top:0px;padding:0px} #container{height:100%} </style>
<link rel="stylesheet" href="map.css">
<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
<SCRIPT src="jquery-1.8.2.min.js" type="text/javascript"></SCRIPT>
<script src="jquery.cookie.js" type="text/javascript"></script>
<script src="gmaps.js" type="text/javascript"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDNMocdJp86tAcriL2uzB2aGnsELnsbTc4" type="text/javascript"></script> 
<script type="text/javascript"> 




	
var marker={
	lat:<?php echo $place["latitude"]?>,
	lng:<?php echo $place["longitude"]?>,
	title:'<?php echo $place["pname"]?>'
	
}

function initialize(){

	window.map = new GMaps({
	  div: '#map',
	  lat:<?php echo $place["latitude"]?>,
	  lng: <?php echo $place["longitude"]?>
	});
	map.addMarker(marker);
	$("#Good").click(postgood);
	$("#Bad").click(postbad);
	$("#Rating").click(postrating);

}
window.onload=initialize;

function postrating(){
	var score = $("#score").val();
	$.ajax({  
	    type: "POST",  
	    url: "api/rating/index.php",  
	    data: {
	    	"rating": score,
	        "pid": <?php echo $place["pid"]?>
	    },
	    dataType: 'json',  
	    success: function (data) {
	         if(data.data == 1){
	         	alert("Succeed");
	         }
	    }  
	}); 
}

function postgood(){
	var tag = $("#tagin").val();
	$.ajax({
		type: "POST",
		url: "api/rating/tag.php",
		data:{
			"type": "good",
			"tag":tag,
			"pid":<?php echo $place["pid"]?>
		},
		dataType: 'json',
		success: function (data) {
			if(data.data == 1){
				alert("Succeed");
			}
		}
	});
}

function postbad(){
	var tag = $("#tagin").val();
	$.ajax({
		type: "POST",
		url: "api/rating/tag.php",
		data:{
			"type": "bad",
			"tag":tag,
			"pid":<?php echo $place["pid"]?>
		},
		dataType: 'json',
		success: function (data) {
			if(data.data == 1){
				alert("Succeed");
			}
		}
	});
}

</script>



</head> 
<style type="text/css">
	#map {
		width:90%;
		height:400px;
		margin-top:30px;
		margin:auto;
		display:block;	
	}
	
	#infodiv {
		font-weight:bold;
	}
	
	#infodiv span {
		color: gray;
		font-size:11px;
	}
	
	#desspan {
		font-size:14px;
		color:black;
	}
	
	.tags {
		font-size:14px;
		color:blue;
	}
	#button-div{
		margin-left: 100px;
	}
	#score{
		margin-top: 10px;
	}
	#tagin{
		margin-top: 10px;
	}
	button{
		margin-top: 10px;
		display: block;
	}
</style>
 
<body>  
 
    <div id="map" ></div>
    <div id="infodiv" style="margin-top:100px;width:80%;display:block;margin:auto;">
		<?php echo $place["pname"]?><br>
		Type:<span><?php echo $place["type"] ?></span><br>
		Location: <span><?php echo $place["address"]?>(<?php echo $place["latitude"]?>,<?php echo $place["longitude"]?>)</span><br>
		Description:<br>
		<span id="desspan" ><?php echo $place["description"]?></span><br>
		Good tags:<span class="tags"><?php if($place["tag"]){echo $place["tag"];}?></span><br>
		Bad tags:<span class="tags"><?php if($place["tag0"]){echo $place["tag0"];}?></span><br>
		
		
		Ratings:
		
		<div id="ratings" style="display:block;margin-left:30px;width:300px;">
			<div id="stars" style="width:40%;display:block;padding-left:10px;float:left">
			<i class="em em-star"></i><br>
			<i class="em em-star"></i><i class="em em-star"></i><br>
			<i class="em em-star"></i><i class="em em-star"></i><i class="em em-star"></i><br>
			<i class="em em-star"></i><i class="em em-star"></i><i class="em em-star"></i><i class="em em-star"></i><br>
			<i class="em em-star"></i><i class="em em-star"></i><i class="em em-star"></i><i class="em em-star"></i><i class="em em-star"></i><br>
			</div>
			
			<div id="count" style="width:25%;display:block;padding-right;10px;float:right;line-height:25px">
				<?php echo getRating($place["rating"],1)?><br>
				<?php echo getRating($place["rating"],2)?><br>
				<?php echo getRating($place["rating"],3)?><br>
				<?php echo getRating($place["rating"],4)?><br>
				<?php echo getRating($place["rating"],5)?><br>
				
			</div>
			
		</div>
		
		
	</div>
	
	<div id="button-div">
			<input id="tagin" type="text" placeholder="tag"></input>
			<button id="Good">Good</button>
			<button id="Bad">Bad</button>
			<input id="score" type="text" placeholder="rating"></input>
			<button id="Rating">Rating</button>
		</div>
  
  
</body>  
</html>
function initialize() {  
  var map = new BMap.Map('map');  
  map.centerAndZoom(new BMap.Point(121.491, 31.233), 11);  
  map.enableScrollWheelZoom(true); 
  map.setCurrentCity("上海");
  map.addControl(new BMap.MapTypeControl());
  map.enableInertialDragging();
}  

function $(id)
{
    return document.getElementById(id);
    }  
function loadScript() {  
  var script = document.createElement("script");  
  script.src = "http://api.map.baidu.com/api?v=2.0&ak=pFQBk39oIDs8dr3uRXWMX47kGEdRxg7w&callback=initialize";//此为v2.0版本的引用方式  
  // http://api.map.baidu.com/api?v=1.4&ak=您的密钥&callback=initialize"; //此为v1.4版本及以前版本的引用方式  
  document.body.appendChild(script);  
  $("list").style.visibility="hidden";
  $("around").style.visibility="hidden";
  $("history").style.visibility="hidden";
  $("route").style.visibility="hidden";
  $("myinfo").style.visibility="hidden";
}  
   
window.onload = loadScript;

//控制顶部菜单栏
var flag=0;
function controltopDIV()
{
    if(flag==0)
    {
        $("map").style.visibility="hidden";
        flag=1;
    }
    else
    {
        $("map").style.visibility="";
        flag=0;    
    }
}
var flag1=1;
function controllistDIV()
{
    if(flag1==0)
    {
        $("list").style.visibility="hidden";
        flag1=1;
    }
    else
    {
        $("list").style.visibility="";
        flag1=0;    
    }
}
var flag2=1;
function controlaroundDIV()
{
    if(flag2==0)
    {
        $("around").style.visibility="hidden";
        flag2=1;
    }
    else
    {
        $("around").style.visibility="";
        flag2=0;    
    }
}
var flag3=1;
function controlhistoryDIV()
{
    if(flag3==0)
    {
        $("history").style.visibility="hidden";
        flag3=1;
    }
    else
    {
        $("history").style.visibility="";
        flag3=0;    
    }
}
var flag4=1;
function controlrouteDIV()
{
    if(flag4==0)
    {
        $("route").style.visibility="hidden";
        flag4=1;
    }
    else
    {
        $("route").style.visibility="";
        flag4=0;    
    }
}
var flag5=1;
function controlmyinfoDIV()
{
    if(flag5==0)
    {
        $("myinfo").style.visibility="hidden";
        flag5=1;
    }
    else
    {
        $("myinfo").style.visibility="";
        flag5=0;    
    }
}


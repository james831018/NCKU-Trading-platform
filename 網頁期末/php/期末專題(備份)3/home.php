<html>
<head>
<meta http-equiv="Content-Type" content="text/html; ; charset=utf-8">
<style type="text/css">
footer {
  position: fixed;
  top: 0;
  left: 0;
  height: 70px;
  background-color: #9999FF;
  width: 100%;
}
footer2{
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  background-color: #D6D6FF;
  width: 150px;
}
body {
  margin-top: 120px;
  margin-left: 180px;
}
.title {
  position: absolute;
  left: 10%;
  top: 25px;
}
.function {
  position: absolute;
  left: 10%;
  top: 80px;
}
.re{
　position:absolute;
　top:0px;
}
.button{
	width:120px;height:40px;border:2px blue none;background-color: #E0E0FF;
	
}
.over {
	width:120px;height:40px;border:2px blue none;background-color: #ADADFF;
	}
</style>
<script>

function TypeChoose(ii){
    var type=ii;
	var oXHR=new XMLHttpRequest();  //IE5相容性問題未解決
	para= "type="+type;   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","product_out_choose.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//	oXHR.setRequestHeader("Content-length", para.length);
//	oXHR.setRequestHeader("Connection", "close");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
			var r=document.getElementById("re");
			r.innerHTML=oXHR.responseText;
		}
	}
	oXHR.send(para);
}
function All(){    
	var oXHR=new XMLHttpRequest();  //IE5相容性問題未解決
	para= "type="+type;   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","product_out.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//	oXHR.setRequestHeader("Content-length", para.length);
//	oXHR.setRequestHeader("Connection", "close");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
			var r=document.getElementById("re");
			r.innerHTML=oXHR.responseText;
		}
	}
	oXHR.send(para);
}
function Search(){
    var keyword=document.getElementById("keyword").value;    
	var oXHR=new XMLHttpRequest();  //IE5相容性問題未解決
	para= "keyword="+keyword;   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","search2.php",true);
	oXHR.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//	oXHR.setRequestHeader("Content-length", para.length);
//	oXHR.setRequestHeader("Connection", "close");
	oXHR.onreadystatechange= function(){
		if(oXHR.readyState==4 &&(oXHR.status==200||oXHR.status==304)){
			var r=document.getElementById("re");
			r.innerHTML=oXHR.responseText;
		}
	}
	oXHR.send(para);
}
</script>
</head>

<footer2>
<div class="function">
<input type="button" onMouseOver="this.className='over';" onMouseOut="this.className='button';" class="button" value="全部" id="type" onclick="All()"><br>
<input type="button" onMouseOver="this.className='over';" onMouseOut="this.className='button';" class="button" value="種類1" id="type" onclick="TypeChoose(1)"><br>
<input type="button" onMouseOver="this.className='over';" onMouseOut="this.className='button';" class="button" value="種類2" id="type" onclick="TypeChoose(2)"><br>
<input type="button" onMouseOver="this.className='over';" onMouseOut="this.className='button';" class="button" value="種類3" id="type" onclick="TypeChoose(3)"><br>
</div>
</footer2>

<footer>
<div class="title">
<input type="text" style="width:200px" id="keyword" >
<input type="button" value="搜尋" id="type" onclick="Search()"><br>
</div>
</footer>

<body>
<style type="text/css">
table
{
  //width:350px;
  //height:250px;
  //float:left;
}
</style>
<div id="re">
<?php

$host="localhost";
$user="root";
$upwd="0000";
$db="product";

$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_query("SET NAMES 'UTF8'");
mysql_select_db($db, $link) or die ("Unable to select database!");

$query = 'SELECT* FROM detail';
$result = mysql_query($query, $link )or die ("Error in query: $query.". mysql_error());;
$text='<table><tr>';
$ii=0;
while ($row = mysql_fetch_array($result)) {
	//header('Content-Type:image/jpeg');
	//$picture=base64_decode(@$row[picture]);	    
	$ii=$ii%3;	
    $text=$text.'<td width="400" align="center"><table style="border:3px #cccccc solid; align=left;width:350px"><tr><td rowspan="4" width="200" style="border-right:1px #cccccc solid;border-bottom:1px #cccccc solid;"><img src="data:image/;base64,'.@$row[picture].'" width="200" height="150"></td><td>商品名稱:'.@$row[name].'</td></tr><br>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;價格:'.@$row[price].'</td></tr><br>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;數量:'.@$row[number].'</td></tr><br>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分類:'.@$row[type].'</td></tr><br>
	<tr><td>商品描述:</td></tr>
    <tr><td colspan="2"  style="vertical-align:text-top;border:1px #cccccc solid;" height="70">'.@$row[comment].'</td></tr>    
    </table></td>';
    if($ii==2){
		$text=$text.'</tr><tr>';
	}	
	$ii=$ii+1;
	
}
$text='<html>'.$text.'</tr></table></html>';
print $text;
?>
</div>
</body>
</html>
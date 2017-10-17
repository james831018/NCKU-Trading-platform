<?php

$host="localhost";
$user="root";
$upwd="";
$db="student";

$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_select_db($db, $link) or die ("Unable to select database!");

$query="SELECT * FROM `user`";
$result=mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
//$ttry=mysql_query("INSERT INTO `user` (`id`, `name`, `password`) VALUES ('4', 'F16789', '233');",$link) or die("nono");

while ($rows=mysql_fetch_array($result)){
	echo " in while <br>";
  echo " hihi $rows[0] $rows[1] $rows[2] <br>";
}
echo "not find";

?>
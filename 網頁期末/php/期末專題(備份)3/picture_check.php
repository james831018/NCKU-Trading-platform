<?php
//if(@$_POST[name])
{
$host="localhost";
$user="root";
$upwd="0000";
$db="product";

$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_query("SET NAMES 'UTF8'");
mysql_select_db($db, $link) or die ("Unable to select database!");
//$picturetype=$_FILES['photo']['type'];
$result=mysql_query("INSERT INTO detail (name,price,number,type,comment,picture,picturetype) VALUES ( '$_POST[name]', '$_POST[price]','$_POST[number]','$_POST[type]','$_POST[comment]','$_POST[sessionImg]','$_POST[picturetype]')", $link);
}
?>
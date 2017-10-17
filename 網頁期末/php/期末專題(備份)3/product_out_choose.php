<style type="text/css">
table
{
  //width:350px;
  //height:250px;
  //float:left;
}
</style>
<?php
$host="localhost";
$user="root";
$upwd="0000";
$db="product";

$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_query("SET NAMES 'UTF8'");
mysql_select_db($db, $link) or die ("Unable to select database!");

$query = "SELECT* FROM detail WHERE type='".$_POST[@type]."'";
$result = mysql_query($query, $link )or die ("Error in query: $query.". mysql_error());;
$text="<table><tr>";
$ii=0;
while ($row = mysql_fetch_array($result)) {
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
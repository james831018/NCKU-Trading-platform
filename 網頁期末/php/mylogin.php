<?php

//================================================================找到+連線資料庫
$host="localhost";
$user="root";
$upwd="";
$db="student";
$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_select_db($db, $link) or die ("Unable to select database!");
//================================================================找會員
$ipuname=$_POST['uname'];
$ip_pw=$_POST['upwd'];
$query="SELECT * FROM `user` where name='$ipuname' && password='$ip_pw'";
$query1="SELECT * FROM `user` where name='$ipuname'";
$query2="SELECT * FROM `user` where password='$ip_pw'";
//$result=mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
$result1=mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
$result2=mysql_query($query1,$link) or die ("Error in query: $query1. " . mysql_error());
//================================================================印出會員
while(1){
	if($rows=mysql_fetch_array($result1)){//符合
	//if($rows=mysql_fetch_array($result1) && $rows2=mysql_fetch_array($result2)){
		/*echo "$rows[0] $rows[1] $rows[2] <br>";
		//echo "回到拍賣網站</br>"
		echo '<button onclick="https://www.google.com.tw/">回到拍賣網站</button>';*/
		/*echo'<button onclick="http://140.116.245.148/WebCourse/students/f94021026/try/2.php">回拍賣</button>';
		echo'~~Wellcome~~';
		echo'<form method=post name="one" action="http://140.116.245.148/WebCourse/students/f94021026/try/2.php">';
		echo'第一件：<br>';
		echo'商品：<input type="text" name="item1" value="鉛筆"><br>';
		echo'數量：<input type="text" name="num1" value="1"><br>';
		echo'價格：<input type="text" name="pri1" value="10"><br>';
		echo'<input type=submit value="OK">';
		echo'</form>';*/
		echo'<body onLoad="test.click();">';
		echo'<h1>登入成功</h1>';
		echo'<a id="test" href="http://www.kimo.com.tw">LINK</a>';//跳到首頁
		echo'</body>';
		break;
	}
	else if($rows=mysql_fetch_array($result2)){//有帳號，密碼錯誤
		echo'<form action="http://localhost/mylogin.php" method=post>';
		echo'<p>密碼錯誤請重新登入:';
		echo'</p>';
		echo'帳號:<input type=text name="uname"></br>';
		echo'密碼:<input type=password name="upwd"></br>';
		echo'<button onclick="http://localhost/mylogin.php">申請帳號</button>';
		echo'<input type=submit value="登入">';
		echo'<p>';
		echo'</form>';
		break;
	}
	else {//無此帳號
		echo'<form action="http://localhost/mylogin.php" method=post>';
		echo'<p>帳號錯誤重新登入:';
		echo'</p>';
		echo'帳號:<input type=text name="uname"></br>';
		echo'密碼:<input type=password name="upwd"></br>';
		echo'<button onclick="http://localhost/mylogin.php">申請帳號</button>';
		echo'<input type=submit value="登入">';
		echo'<p>';
		echo'</form>';
		break;
	}
}
//echo "out the while";
?>
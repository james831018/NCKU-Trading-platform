<?php

//================================================================找到+連線資料庫
$host="localhost";
$user="root";
$upwd="";
$db="student";
$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_select_db($db, $link) or die ("Unable to select database!");
//================================================================確認密碼兩次都一樣
$ipuname=$_POST['uname'];
$ip_pw=$_POST['upwd'];
$ip_repw=$_POST['re_upwd'];

if($ip_pw!=$ip_repw && $ip_pw!=NULL){
	echo'<form action="http://localhost/request.php" method=post>';
	echo'<p>密碼確認失敗:';
	echo'</p>';
	echo'帳號:<input type=text name="uname"></br>';
	echo'密碼:<input type=password name="upwd"></br>';
	echo'確認密碼 :<input type=password name="re_upwd"></br>';
	echo'<input type=submit value="申請">';
	echo'<p>';
	echo'</form>';
}
else if($ip_pw==$ip_repw && $ip_pw!=NULL){//找是否已經有此帳號
	$query="SELECT * FROM `user` where name='$ipuname'";
	$result=mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
	if($rows=mysql_fetch_array($result)){//符合
		echo'<form action="http://localhost/request.php" method=post>';
		echo'<p>此帳號已存在:';
		echo'</p>';
		echo'帳號:<input type=text name="uname"></br>';
		echo'密碼:<input type=password name="upwd"></br>';
		echo'確認密碼 :<input type=password name="re_upwd"></br>';
		echo'<input type=submit value="申請">';
		echo'<p>';
		echo'</form>';
	}
	else{
		$result=mysql_query("INSERT INTO `user` (`name` ,`password`) VALUES ('F111111', '1123456');", $link)or die ("Unable to connect!");
		printf("帳號申請成功");
	} //INSERT INTO `user` (`name`, `password`) VALUES ('ads', 'aa');

}
else {//沒填
	echo'<form action="http://localhost/request.php" method=post>';
	echo'<p>要記得輸入唷 <3:';
	echo'</p>';
	echo'帳號:<input type=text name="uname"></br>';
	echo'密碼:<input type=password name="upwd"></br>';
	echo'確認密碼 :<input type=password name="re_upwd"></br>';
	echo'<input type=submit value="申請">';
	echo'<p>';
	echo'</form>';
}
//================================================================找會員
/*$query="SELECT * FROM `user` where name='$ipuname' && password='$ip_pw'";
$query1="SELECT * FROM `user` where name='$ipuname'";
$query2="SELECT * FROM `user` where password='$ip_pw'";
//$result=mysql_query($query,$link) or die ("Error in query: $query. " . mysql_error());
$result1=mysql_query($query,$link) or die ("Error in query: $query1. " . mysql_error());
$result2=mysql_query($query1,$link) or die ("Error in query: $query2. " . mysql_error());
//================================================================印出會員
while(1){
	if($rows=mysql_fetch_array($result1)){//符合
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
}*/
?>
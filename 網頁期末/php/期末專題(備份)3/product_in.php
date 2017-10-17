<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') { 
        if( $_FILES['photo']['error'] != '4' ) { // 檢查有沒上傳圖檔
            $file = $_FILES['photo']['tmp_name'] ;
            $fp      = fopen($file, 'r');
            $rawDataSS1 = fread($fp, filesize($file));
            fclose($fp);
            $_SESSION['sessionImg'] = $encodedSS1Data = base64_encode($rawDataSS1); // 將檔案邊碼(base64)後放入SESSION
			$picture=base64_encode($rawDataSS1);
        }
    }
?>
<?php
if(@$_POST[name]){
$host="localhost";
$user="root";
$upwd="0000";
$db="product";

$link=mysql_connect($host,$user,$upwd) or die ("Unable to connect!");
mysql_query("SET NAMES 'UTF8'");
mysql_select_db($db, $link) or die ("Unable to select database!");
$picturetype=$_FILES['photo']['type'];
$result=mysql_query("INSERT INTO detail (name,price,number,type,comment,picture,picturetype) VALUES ( '$_POST[name]', '$_POST[price]','$_POST[number]','$_POST[type]','$_POST[comment]','$picture','$picturetype')", $link);
}
?>

<html>
<head>
<script>
/*function a(){
    var name=document.getElementById("name").value;
	var price=document.getElementById("price").value;
	var number=document.getElementById("number").value;
	var type=document.getElementById("type").value;
	var comment=document.getElementById("comment").value;
	var sessionImg=<?php echo $_SESSION['sessionImg'];?>
	var picturetype=<?php echo $_FILES['photo']['type'];?>
	var oXHR=new XMLHttpRequest();  //IE5相容性問題未解決
	para= "name="+name+"price="+price+"number="+number+"type="+type+"comment="+comment+"sessionImg="+sessionImg+"picturetype="+picturetype;   // encodeURIComponent(para); URL編碼
	oXHR.open("POST","picture_check.php",true);
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
}*/
</script>
</head>

<body>


<div id="main" style=";text-align:center;">

  <form enctype="multipart/form-data" action="" method="post">
    <table style="border:3px #cccccc solid; align=left;width:350px">
    <tr><td rowspan="4" width="200" height="150" style="border-right:1px #cccccc solid;border-bottom:1px #cccccc solid;"><?php
            if( isset($_SESSION['sessionImg']) && $_SESSION['sessionImg'] != '' ) { // 檢查SESSION有沒有值
                echo '<img src="data:image/;base64,'.$_SESSION['sessionImg'].'" width="200" height="150">' ; // 顯示圖檔
            }
        ?></td>
    <td>商品名稱:<input type="text" name="name" placeholder="請輸入商品名稱" size="10"></td></tr><br>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;價格:<input type="text" name="price" size="5" value="0"></td></tr><br>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;數量:<input type="text" name="number" size="5" value="1"></td></tr><br>
    <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分類:<select name="type">
                   <option value="0" selected="selected">未分類</option>
                   <option value="1">1991</option>
                   <option value="2">1992</option>
                   <option value="3">1993</option>
                   <option value="4">1994</option>
                   <option value="5">1995</option>
                   <option value="6">1996</option>
                   <option value="7">1997</option>
                   <option value="8">1998</option>
                   <option value="9">1999</option>
                   <option value="10">2000</option>
                   <option value="11">2001</option>
               </select>
    </td><tr>
    <tr><td colspan="2"><input type="file" accept="image/*" name="photo" style="width:150px" ><input type="submit" value="圖片上傳"></td></tr>
    <tr><td>商品描述:</td></tr>
    <tr><td colspan="2"><textarea name="comment" rows="5" cols="50" style="resize:none;" placeholder="請簡單描述商品..."></textarea></td></tr>
	</table>
    <input type="submit" value="送出">
    <div id="re"></div>
    
  </form> 
</div>


</body>

</html>
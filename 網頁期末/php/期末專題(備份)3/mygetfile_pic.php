<HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>圖片檔案上傳</title>
</head><BODY><H3>圖檔存入相關資訊：<HR></H3>

<?php
      echo "<BLOCKQUOTE>";
      echo "檔案名稱：" . $_FILES["upfile"]["name"] . "<BR>";
      echo "檔案大小：" . $_FILES["upfile"]["size"] . "<BR>";
      echo "檔案類型：" . $_FILES["upfile"]["type"] . "<BR>";
      echo "暫存檔名：" . $_FILES["upfile"]["tmp_name"] . "<BR>";
      if ( $_FILES["upfile"]["size"] > 0 ) 
        {		
         //開啟圖片檔
         //$file = fopen($_FILES["upfile"]["tmp_name"], "rb");		 
		 if($_FILES["upfile"]["size"] >700000){         
		 /*$size = getimagesize($_FILES['upfile']['tmp_name']);
         $width = $size[0];
         $height = $size[1];
		 $start=ceil($width*$height*0.1)+ceil($width*0.1);
		 //$stop=$width*$height*0.9-$width*0.1;
		 $path=ceil($width*0.8)*ceil($height*0.8);*/
		 // 讀入圖片檔資料
         $fileContents = file_get_contents($_FILES["upfile"]["tmp_name"],1,null,0,600000);
		 //$fileContents2 = file_get_contents($_FILES["upfile"]["tmp_name"],1,null,700000,100000);
		 }else{
            $fileContents = file_get_contents($_FILES["upfile"]["tmp_name"]);
			$fileContents2="";
		 }		 
         //關閉圖片檔
         //fclose($file);

         // 圖片檔案資料編碼
         $fileContents = base64_encode($fileContents);
		 //$fileContents2 = base64_encode($fileContents2);

         //連結MySQL Server
         //$dbnum=mysql_connect("127.0.0.1","sa","12345");
		 $host="localhost";
		 $user="root";
		 $upwd="0000";
		 $db="pic";

		 $link=mysql_connect($host,$user,$upwd,true) or die ("Unable to connect!");
         //選取資料庫
         //mysql_select_db("pic");
		 mysql_select_db($db, $link) or die ("Unable to select database!");
         //組合查詢字串
         $SQLSTR="Insert into myimage (filename,filesize,filetype,filepic) values('"
                  . $_FILES["upfile"]["name"] . "',"
                  . $_FILES["upfile"]["size"] . ",'"
                  . $_FILES["upfile"]["type"] . "','"
                  . $fileContents . "'),('".$_FILES["upfile"]["name"]."','0','0','".$fileContents2."')";		 
		 /*$SQLSTR2="Insert into myimage (filepic2) values('"
                  . $fileContents2 . "')";
		 /*$method="Update myimage set filepic2='".$fileContents2."' where filename='".$_FILES["upfile"]["name"]."'";
		 $result=mysql_query($method,$link);*/
         //將圖片檔案資料寫入資料庫
         if(!mysql_query($SQLSTR)==0)
           {
            echo "您所上傳的檔案已儲存進入資料庫<a href=\"showpic.php?filename="
                 . $_FILES["upfile"]["name"] . "\">"
                 . $_FILES["upfile"]["name"] . "</a>";
           }
         else
           {
            echo "您所上傳的檔案無法儲存進入資料庫";
           } 
        }
      else
        {
         echo "圖片上傳失敗";
        }
      echo "</BLOCKQUOTE>";
?>

<HR></BODY></HTML>
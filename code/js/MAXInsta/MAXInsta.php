
<?php include('head.php');?>
<meta name="viewport" content="width=1920">
  <title>NOTEPAD ONLINE</title>
 

  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  



 <style>
     body {
      background-color: rgba(245,245,245, 1);
      background-size: 100% 110%;
      height:100%;
      margin: 200;
    }
	
/* toast */
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar2 {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

#snackbar2.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}



@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}

/* toast */
</style>
  <script>
  function toast(ID) {
  var x = document.getElementById(ID);
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 10000);
}
 </script>
 
 
<?php


if (isset($_POST["UPDATE_WEB"]))
	{
		
   $Setings_temp_MAX2020Pre = 'MODE==START|SOMAY==NHIEUMAY|CHAYTIEP_XY==YES|DSMAY==MAY01,MAY02,MAY03,MAY04,MAY05,MAY297,MAY298,MAY300,MAY905|AccX==1|AccY==500|DSMAY==MAY01,MAY02,MAY03,MAY04,MAY05,MAY99,MAY297,MAY298,MAY300,MAY905|SOMAY_NAP_ACC==NHIEUMAY|ID_Follow_FollowersOF_Username_ID==af3adc75c9|ID_Follow_Username_ID==db686cdd40|ID_Reels_Photo_Caption_ID==706febcc76|ID_Reels_Video_Caption_ID==8377037b12|ID_CMT_Newsfeed_ID==5f6df3f68d|ID_CMT_Reels_ID==526bd213b0|num_Follow_FollowersOF_Username==5|num_Follow_Username==2|A_NAP_ACC==15|DelayLoop==5|SOMAY==MAY01|numAlbum_VideoStory==AlbumVideo 2|numvideo_VideoStory==2|numAlbum_PhotoStory==AlbumPhoto 1|numphoto_PhotoStory==5|CMTType_CMT_Reels==iCon|Tym_CMT_Reels_opt==Random|num_CMT_Reels==1|CMTType_CMT_Newsfeed==Random|Tym_CMT_Newsfeed_opt==Tym|num_CMT_Newsfeed==5|num_LuotNewsfeed_WLIKE==5|num_LuotNewsfeed_noLIKE==2|ResetIPType==Reset SIM|num_Follow_FollowGoiY==10|num_UnFollow_ListFollowing==2|ChangeAvatar_opt==ON|numAlbum_ChangeAvar==AlbumPhoto 1|numphoto_PhotoReel==5|numAlbum_PhotoReel==AlbumPhoto 1|numvideo_VideoReel==1|numAlbum_VideoReel==AlbumVideo 5|num_Follow2Follower==5|Chay_Xong_Nha_May==0933998772|MA_CHAY_TUAN_HOAN==082022|';
	
 if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {
	  $resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");$rowMAYNOTE = mysqli_fetch_assoc($resultMAYNOTE);$MAYNOTE = $rowMAYNOTE['code'];

    $create = $ketnoi->query("UPDATE `notepad` SET 

      `Setings_temp_MAX2020Pre` =  '".$Setings_temp_MAX2020Pre."', 
  
      `createdate` = now() WHERE `code` = '".$rowMAYNOTE['code']."' ");
	  

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành công", " Vừa UPDATE WEB thành công !\nChinh lai thong so truoc khi chay !", "success");
      setTimeout(function(){ location.href = "/MAXInsta.php" },500);</script>'; //note success hiden `password` = '".$password."',
      exit();
    }
    else
    {
      echo '<div class="alert alert-danger">Lỗi kỹ thuật!</div>';
    }
  }
	 
	}
	else {}	
	
	


if (isset($_POST["Save_NAP_ACC"]))
	{
		
	///////////////////////////////////FUNCTION ///////////////////////////////////////////////
	$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");$row_temp= mysqli_fetch_assoc($resultMAYNOTE);    // MUST NOT IN FUNCTION
$str_temp_SETUP = "MODE==12|AccX==15|AccY==5000|A15==11|A12==10|abc16==kljpjs|abc19==kljpjs";  // $str_temp = $row_temp['Setings_temp_MAX2020Pre']; if ($str_temp == null OR $str_temp == " ") {
	if ($row_temp['Setings_temp_MAX2020Pre'] == '') {$str_temp = $str_temp_SETUP;} else {$str_temp = $row_temp['Setings_temp_MAX2020Pre'];}
	
$str_temp = str_replace(array("zkd_settings_temp_sub|","| |MODE=="),array("","MODE=="),$str_temp); // fix ||| settings_temp_sub multi

function GetValue_writeAPI($var_inputName) {
$valueOK = "nocontent0";
    global $str_temp; // OR $GLOBALS['str_temp']
//$str_temp = "MODE==12|AccX==15|AccY==5000|A15==11|A12==10|abc16==kljpjs|abc19==kljpjs";  // $str_temp = $row_temp['Setings_temp_MAX2020Pre']; if ($str_temp == null OR $str_temp == " ") {
$Settings = explode("|",$str_temp);

  
foreach ($Settings as $value) {
if (strpos($value, $var_inputName) !== false) {    //if (strpos($value, '12 =')) 
    $valueOKz = explode("==", $value); 
    if ($valueOKz[1] == null OR $valueOKz[1] == " ") { echo "nocontent1";} else {$valueOK = $valueOKz[1];  break;     };
} else { } //if (strpos($value, '12 ='))

} //foreach ($Settings as $value) {

return $valueOK;
echo $valueOK;
}


function SetValue($var_inputName,$var_inputValue) {
	global $str_temp; // OR $GLOBALS['str_temp']
	  //$id = '6f5ea0f037';
//$querychecknote = $ketnoi->query("SELECT * FROM `notepad` WHERE `code` = '".$id."' ");
//$check_notepad = mysqli_num_rows($querychecknote);


	//$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'KTouchHelper.txt' ");$row_temp= mysqli_fetch_assoc($resultMAYNOTE);
	
//$str_temp_SETUP = "MODE==12|AccX==15|AccY==5000|A15==11|A12==10|abc16==kljpjs|abc19==kljpjs";  // $str_temp = $row_temp['Setings_temp_MAX2020Pre']; if ($str_temp == null OR $str_temp == " ") {
	//if ($row_temp['Setings_temp_MAX2020Pre'] == '') {$str_temp = $str_temp_SETUP;} else {$str_temp = $row_temp['Setings_temp_MAX2020Pre'];}
$Settings = explode("|",$str_temp);

 foreach ($Settings as $key => $value) {
if (strpos($value, $var_inputName) !== false) {    // to find Key/index   //if (strpos($value, '12 =')) 
	$KeyNew = $key+1 ; echo $key+1;


} else { } //if (strpos($value, '12 ='))

} //foreach ($Settings as $value) {
	
	$Settings[$KeyNew-1] = $var_inputName."==".$var_inputValue;   // set new value for $var_inputname
	echo "</br></br></br>";
	//$replaced = array_replace($Settings, $Settings2);
	
	$Settings_NewString = "zkd_settings_temp_sub"; $Total = count($Settings);
	for($i=0; $i<=$Total-1; $i++) { $Settings_NewString = $Settings_NewString."|".$Settings[$i];} ;
	
	$Settings_NewString = str_replace(array("zkd_settings_temp_sub|","| |MODE=="),array("","MODE=="),$Settings_NewString); // fix ||| settings_temp_sub multi 
echo "this is SettingsNewString: ".$Settings_NewString."</br>";
print_r($Settings);

echo count($Settings);

return $Settings_NewString;
}


	///////////////////////////////////FUNCTION ///////////////////////////////////////////////
	

  $DSMAY = GetValue_writeAPI('DSMAY');$DSMAY = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($DSMAY))));
  $A_NAP_ACC = GetValue_writeAPI('A_NAP_ACC');$A_NAP_ACC = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($A_NAP_ACC))));
  $SOMAY_NAP_ACC = GetValue_writeAPI('SOMAY_NAP_ACC');$MAY = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($SOMAY_NAP_ACC))));


   $title = $row['title'];
   //$MODE = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['MODE']))));
   //$SOMAY = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['SOMAY_NAP_ACC']))));
 //$MAY = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['MAY']))));
   //$AccX = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['AccX']))));
   //$AccY = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['AccY']))));
   //$XY = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['XY']))));
   
   
      //	$tbSOMAY = $SOMAY_NAP_ACC ; $tbMAY = $MAY ;
	//if ($SOMAY == "NHIEUMAY") {$MAY = $MAY;} 
	//elseif ($SOMAY == "MAY") {$MAY = "MAY01";$SOMAY = "MAY01";} 
	//else {$MAY = $SOMAY;};
	
	if ($SOMAY_NAP_ACC == "NHIEUMAY") {$SOMAY_NAP_ACC = $DSMAY;} else {$SOMAY_NAP_ACC = $MAY;     $A_NAP_ACC =1;};
	
	
	
   $content_temp = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['content_NAP_ACC']))));
   
   $base64X =  base64_encode($_POST['content_NAP_ACC']);
   $base64X = str_replace('+', 'PLUS', $base64X);
   $base64X = str_replace('/', 'thayXET', $base64X);
   $base64X = str_replace('=', 'bAnG', $base64X);
  
		 $content = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($base64X))));
		 
		// $A_NAP_ACC = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['A_NAP_ACC']))));
		 
		 $MODE_Line = "NAP_ACCx==".$A_NAP_ACC."==".$content;
		 //if ($my_username == "kjmtjzhan@gmail.com") {$MODE = "NAP_ACCx==".$A_NAP_ACC."==".$content;} else {};
		   //$content = '\n\n Test NẠP ACC thành công !\n Chức năng sắp có !';
		   
		   //$content_temp = '1.Hãy xóa những dòng này.\n2.Dán file acc đã mua vào đây.\n3.Ít nhất dán 15 acc, ít quá dùng tool làm gì.\n4.Hỗ trợ mọi định dạng (UID|PASS|2FA|Token|Cookie|v.v....).\n5.Sau khi dán acc, quay lại giao diện điều khiển, nhấn Nạp ACC.\n\nLƯU Ý:\n-Tool tự xóa ACC khỏi server để an toàn cho anh em.\n-Server không trữ lại ACC của anh em.\n-Cần thêm thông tin, LH Admin: 0933.998.772 (Mr Nhân).';
		//$resultACC_txt = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = '3Utools_Udisk_MAX2020_1.ACC_ACC.txt' ");$rowACC_txt = mysqli_fetch_assoc($resultACC_txt);$ACC_txt = $rowACC_txt['code'];
		
		
			    //$contentX = $title.'\nSettings:\nAccX=='.$AccX.'\nAccY=='.$AccY.'\nXY=='.$XY.'\nUsername=='.$my_username.'\nMODE=='.$MODE.'\nMAY=='.$MAY.'\nDATE==';  
				$contentX = $title.'\nSettings:\nMODE=='.$MODE_Line.'\nMAY=='.$SOMAY_NAP_ACC.'\nDATE==ZnZ'.date("Y-m-d H:i:s").'FrankyNouva'      ;  
				
				//SetValue("MODE","NAP_ACC");
				
//$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");$row_temp = mysqli_fetch_assoc($resultMAYNOTE);

$resultA86L1 = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");
$row = mysqli_fetch_assoc($resultA86L1);

       $countLine = count(explode("\n", $content_temp));
     if($countLine < 5) {    echo '<script type="text/javascript">swal("Lỗi", " Thêm ít nhất 5 acc, ít hơn thì đi ngủ, không cần nuôi!", "error");setTimeout(function(){ location.href = "/MAXInsta.php"},10000);</script>';die();} 
	 else

	                       {};
						   
						   
			
  if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {
	  

		  
    $create = $ketnoi->query("UPDATE `notepad` SET 
      `MODE` =  'NAP_ACC',
      `NAP_ACC` =  '".$content."', 
	  `content` =  '".$contentX."', 
      `createdate` = now() WHERE `code` = '".$row['code']."' ");
	  
	  
/*
	 
	
 if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {


    $create = $ketnoi->query("UPDATE `notepad` SET 
      `MODE` =  '".$MODE."',
      `NAP_ACC` =  '".$content."', 
	  `content` =  '".$contentX."', 
  
      `createdate` = now() WHERE `code` = '".$row_temp['code']."' ");
	  
*/
	  
	  

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành công", " Đang tiến hành NẠP ACC lên máy !", "success");
      setTimeout(function(){ location.href = "/MAXInsta.php" },10000);</script>'; //note success hiden `password` = '".$password."',
      exit();
    }
    else
    {
      echo '<div class="alert alert-danger">Lỗi kỹ thuật!</div>';
    }  
  }
 
	}

	  
	else {}
	  


	  
	  
	  
	  
	
	
if (isset($_POST["sub_savecl"]))
	{
		
   $content = '';
	
 if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {
	  $resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'log.txt' ");$rowMAYNOTE = mysqli_fetch_assoc($resultMAYNOTE);$MAYNOTE = $rowMAYNOTE['code'];

    $create = $ketnoi->query("UPDATE `notepad` SET 

      `content` =  '".$content."', 
  
      `createdate` = now() WHERE `code` = '".$rowMAYNOTE['code']."' ");
	  

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành công", " Bạn vừa xóa nhật ký chạy thành công !", "success");
      setTimeout(function(){ location.href = "/edit/'.$row['code'].'" },0);</script>'; //note success hiden `password` = '".$password."',
      exit();
    }
    else
    {
      echo '<div class="alert alert-danger">Lỗi kỹ thuật!</div>';
    }
  }
	 
	}
	else {}
	
	
if (isset($_POST["sub_save2"]))
	
	{
		
   $title = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['title']))));
   $title = $row['title'];
   $MODE = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['MODE']))));
   $content = $row['content'].'ResetNXmode';	
   
   
   	$tbSOMAY = $SOMAY ; $tbMAY = $MAY ;
	if ($SOMAY == "NHIEUMAY") {$MAY = $MAY;} 
	elseif ($SOMAY == "MAY") {$MAY = "MAY01";$SOMAY = "MAY01";} 
	else {$MAY = $SOMAY;};
	
	
	
 if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {
    $create = $ketnoi->query("UPDATE `notepad` SET 
	  
      `content` =  '".$content."', 
      `ip` = '".$ip_address."',
      `createdate` = now() WHERE `code` = '".$row['code']."' ");
	  

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành công", " 1.Các thông số vừa chuyển về Reset 0.\n2.Hãy xem lại các thông số.\n3.Chỉnh lại theo ý bạn nếu muốn.\n4.Chuyển MODE thành START, bấm LƯU & CHẠY !\n\nTHOÁT WEB NẾU BẠN MUỐN, KHÔNG CẦN TREO MÁY/WEB", "success");
      setTimeout(function(){ location.href = "/edit/'.$row['code'].'" },100);</script>'; //note success hiden `password` = '".$password."',
      exit();
    }
    else
    {
      echo '<div class="alert alert-danger">Lỗi kỹ thuật!</div>';
    }
  }
	 
	}
	else {}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

if (isset($_POST["sub_save12week"]))
	
	{
		
   $title = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['title']))));
   $title = $row['title'];
   $MODE = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['MODE']))));

   $content = $row['content'].'ResetNXmode';
   
      	$tbSOMAY = $SOMAY ; $tbMAY = $MAY ;
	if ($SOMAY == "NHIEUMAY") {$MAY = $MAY;} 
	elseif ($SOMAY == "MAY") {$MAY = "MAY01";$SOMAY = "MAY01";} 
	else {$MAY = $SOMAY;};
	
	
 if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {
    $create = $ketnoi->query("UPDATE `notepad` SET 

      `content` =  '".$content."', 
      `ip` = '".$ip_address."',
      `createdate` = now() WHERE `code` = '".$row['code']."' ");
	  

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành công", " 1.Các thông số vừa chuyển về (Acc 1 -2 Tuần).\n2.Hãy xem lại các thông số.\n3.Chỉnh lại theo ý bạn nếu muốn.\n4.Chuyển MODE thành START, bấm LƯU & CHẠY !\n\nTHOÁT WEB NẾU BẠN MUỐN, KHÔNG CẦN TREO MÁY/WEB", "success");
      setTimeout(function(){ location.href = "/edit/'.$row['code'].'" },100);</script>'; //note success hiden `password` = '".$password."',
      exit();
    }
    else
    {
      echo '<div class="alert alert-danger">Lỗi kỹ thuật!</div>';
    }
  }
	 
	}
	else {}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	

if (isset($_POST["sub_saveNewbie"]))
	
	{
		
  
	 
	}
	else {}
	
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	if (isset($_POST["sub_save5"]))
	
	{
		
   $title = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['title']))));
   $title = $row['title'];
   $MODE = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_POST['MODE'])))); 
   $content = $row['content'].'ResetNXmode';
   
      	$tbSOMAY = $SOMAY ; $tbMAY = $MAY ;
	if ($SOMAY == "NHIEUMAY") {$MAY = $MAY;} 
	elseif ($SOMAY == "MAY") {$MAY = "MAY01";$SOMAY = "MAY01";} 
	else {$MAY = $SOMAY;};
	
	
 if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {
    $create = $ketnoi->query("UPDATE `notepad` SET 

      `content` =  '".$content."', 
      `ip` = '".$ip_address."',
      `createdate` = now() WHERE `code` = '".$row['code']."' ");
	  

    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành công", " 1.Các thông số vừa chuyển về XtreMode.\n2.Hãy xem lại các thông số.\n3.Chỉnh lại theo ý bạn nếu muốn.\n4.Chuyển MODE thành START, bấm LƯU & CHẠY !\n\nTHOÁT WEB NẾU BẠN MUỐN, KHÔNG CẦN TREO MÁY/WEB", "success");
      setTimeout(function(){ location.href = "/edit/'.$row['code'].'" },100);</script>'; //note success hiden `password` = '".$password."',
      exit();
    }
    else
    {
      echo '<div class="alert alert-danger">Lỗi kỹ thuật!</div>';
    }
  }
	 
	}
	else {}
	
	
	
	
if (isset($_POST["sub_save"]))
	
{
	

	///////////////////////////////////FUNCTION ///////////////////////////////////////////////
	$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");$row_temp= mysqli_fetch_assoc($resultMAYNOTE);    // MUST NOT IN FUNCTION
$str_temp_SETUP = "MODE==12|AccX==15|AccY==5000|A15==11|A12==10|abc16==kljpjs|abc19==kljpjs";  // $str_temp = $row_temp['Setings_temp_MAX2020Pre']; if ($str_temp == null OR $str_temp == " ") {
	if ($row_temp['Setings_temp_MAX2020Pre'] == '') {$str_temp = $str_temp_SETUP;} else {$str_temp = $row_temp['Setings_temp_MAX2020Pre'];}
	
$str_temp = str_replace(array("zkd_settings_temp_sub|","| |MODE=="),array("","MODE=="),$str_temp); // fix ||| settings_temp_sub multi

function GetValue_writeAPI($var_inputName) {
$valueOK = "nocontent0";
    global $str_temp; // OR $GLOBALS['str_temp']
//$str_temp = "MODE==12|AccX==15|AccY==5000|A15==11|A12==10|abc16==kljpjs|abc19==kljpjs";  // $str_temp = $row_temp['Setings_temp_MAX2020Pre']; if ($str_temp == null OR $str_temp == " ") {
$Settings = explode("|",$str_temp);

  
foreach ($Settings as $value) {
if (strpos($value, $var_inputName) !== false) {    //if (strpos($value, '12 =')) 
    $valueOKz = explode("==", $value); 
    if ($valueOKz[1] == null OR $valueOKz[1] == " ") { echo "nocontent1";} else {$valueOK = $valueOKz[1];     break;  };
} else { } //if (strpos($value, '12 ='))

} //foreach ($Settings as $value) {

return $valueOK;
echo $valueOK;
}
	///////////////////////////////////FUNCTION ///////////////////////////////////////////////
	
   $SOMAY = GetValue_writeAPI('SOMAY');
   $DSMAY = GetValue_writeAPI('DSMAY');
 
	$tbSOMAY = $SOMAY ; $tbMAY = $DSMAY ;
	if ($SOMAY == "NHIEUMAY") {$MAY = $DSMAY;} 
	
	elseif ($SOMAY == "MAY") {$MAY = "MAY01";$SOMAY = "MAY01";} 
	
	else {$MAY = $SOMAY;};
	
	
	
$content = 'MAX2020 \nSettings'

.'\nAccX=='.GetValue_writeAPI('AccX')
.'\nAccY=='.GetValue_writeAPI('AccY')
.'\nCHAYTIEP_XY=='.GetValue_writeAPI('CHAYTIEP_XY')

.'\nnumphoto_PhotoReel=='.GetValue_writeAPI('numphoto_PhotoReel')
.'\nnumAlbum_PhotoReelp=='.GetValue_writeAPI('numAlbum_PhotoReel') 
.'\nnumvideo_VideoReel=='.GetValue_writeAPI('numvideo_VideoReel')      
.'\nnumAlbum_VideoReel=='.GetValue_writeAPI('numAlbum_VideoReel') 

.'\nnumphoto_PhotoStory=='.GetValue_writeAPI('numphoto_PhotoStory')
.'\nnumAlbum_PhotoStory=='.GetValue_writeAPI('numAlbum_PhotoStory') 
.'\nnumvideo_VideoStory=='.GetValue_writeAPI('numvideo_VideoStory')      
.'\nnumAlbum_VideoStory=='.GetValue_writeAPI('numAlbum_VideoStory') 


.'\nnum_Follow2Follower=='.GetValue_writeAPI('num_Follow2Follower')
.'\nnum_UnFollow_ListFollowing=='.GetValue_writeAPI('num_UnFollow_ListFollowing') 
.'\nnum_Follow_FollowGoiY=='.GetValue_writeAPI('num_Follow_FollowGoiY') 

.'\nChangeAvatar_opt=='.GetValue_writeAPI('ChangeAvatar_opt')      
.'\nnumAlbum_ChangeAvar=='.GetValue_writeAPI('numAlbum_ChangeAvar') 

.'\nnum_LuotNewsfeed_noLIKE=='.GetValue_writeAPI('num_LuotNewsfeed_noLIKE') 
.'\nnum_LuotNewsfeed_WLIKE=='.GetValue_writeAPI('num_LuotNewsfeed_WLIKE')  
  
.'\nnum_CMT_Newsfeed=='.GetValue_writeAPI('num_CMT_Newsfeed') 
.'\nTym_CMT_Newsfeed_opt=='.GetValue_writeAPI('Tym_CMT_Newsfeed_opt')  
.'\nCMTType_CMT_Newsfeed=='.GetValue_writeAPI('CMTType_CMT_Newsfeed')  
  
  
.'\nnum_CMT_Reels=='.GetValue_writeAPI('num_CMT_Reels') 
.'\nTym_CMT_Reels_opt=='.GetValue_writeAPI('Tym_CMT_Reels_opt')  
.'\nCMTType_CMT_Reels=='.GetValue_writeAPI('CMTType_CMT_Reels') 
 
  

  
.'\nnum_Follow_Username=='.GetValue_writeAPI('num_Follow_Username') 
.'\nnum_Follow_FollowersOF_Username=='.GetValue_writeAPI('num_Follow_FollowersOF_Username')  
.'\nID_Reels_Photo_Caption_ID=='.GetValue_writeAPI('ID_Reels_Photo_Caption_ID') 
.'\nID_Reels_Video_Caption_ID=='.GetValue_writeAPI('ID_Reels_Video_Caption_ID') 

.'\nID_CMT_Newsfeed_ID=='.GetValue_writeAPI('ID_CMT_Newsfeed_ID')  
.'\nID_CMT_Reels_ID=='.GetValue_writeAPI('ID_CMT_Reels_ID') 
.'\nID_Follow_Username_ID=='.GetValue_writeAPI('ID_Follow_Username_ID') 
.'\nID_Follow_FollowersOF_Username_ID=='.GetValue_writeAPI('ID_Follow_FollowersOF_Username_ID')  
  

	
	
 .'\nDelayLoop=='.GetValue_writeAPI('DelayLoop') 
 .'\nResetIPType=='.GetValue_writeAPI('ResetIPType') 
.'\nChay_Xong_Nha_May=='.GetValue_writeAPI('Chay_Xong_Nha_May') 




.'\nUsername=='.$my_username
.'\nMA_CHAY_TUAN_HOAN=='.GetValue_writeAPI('MA_CHAY_TUAN_HOAN')
.'\nMODE=='.GetValue_writeAPI('MODE') 
.'\nMAY=='.$MAY   
.'\nDATE==ZnZ'.date("Y-m-d H:i:s")



.'FrankyNouva'





//MODE==START|SOMAY==MAY01|CHAYTIEP_XY==YES|DSMAY==MAY01,MAY02,MAY03,MAY04,MAY05,MAY297,MAY298,MAY300,MAY905|AccX==1|AccY==5000|A15==11|A12==10|AAA1_VideoChiDinh_ID==https://www.youtube.com/watchv=YkKif77JQWI|AAA1_EnterMethod_SearchKeyApp==OFF|AAA1_EnterMethod_SerachIDApp==OFF|
//AAA1_EnterMethod_SerachKeyBR==OFF|AAA1_EnterMethod_SerachIDBR==OFF|AAA1_EnterMethod_Direct==OFF|AAA1_EnterMethod_Random==OFF|AAA1_B_viewAds==2|AAA1_C_SkipAds==SkipAds|AAA1_A_viewAds==20|AAA1_B_SuggestView==150|AAA1_SuggestView_Option==CÓ|AAA1_SuggestViewNumberPage==5|AAA1_A_SuggestView==45|AAA1_B_LikeDisLikeView==12|AAA1_C_LikeDisLikeOption==LIKE|AAA1_A_LikeDisLikeView==10|AAA1_LikeSpinnedCMT==DisLIKE|AAA1_TymSpinnedCMT==NoTym|AAA1_B_CMT_ID_VideoView==11|AAA1_C_CMT_ID_VideoOption==CMT|AAA1_CMT_ID_VideoNumberCMT==2|AAA1_CMT_ID_VideoCMT_Delay==30|AAA1_A_CMT_ID_VideoView==19|AAA1_CMT_ID_Video_typeCMT_Method==Reply CMT|AAA1_CMT_ID_Video_ViewCMTbeforeCMT_NumberPage==5|AAA1_CMT_ID_Video_ViewCMTafterCMT_NumberPage==2|AAA1_B_DangKyKenhView==120|AAA1_C_DangKyKenhOption==Subcribe|AAA1_A_DangKyKenhView==115|AAA1_Subscribe_Chuong==NO Chuông|AAA1_Subcribe_XemKenh==NO Xem Kênh|AAA1_B_XemGoiY2View==12|AAA1_C_XemGoiY2_Option==CÓ|AAA1_XemGoiY2_NumberPage==3|

//AAA1_XemGoiY2_NumberVideo==3|AAA1_XemGoiY2_TimeView==30|AAA1_RandomVol_Option==CÓ|AAA1_RandomVol_X==12|AAA1_RandomVol_Y==85|AAA1_RandomVol_Ratio==45|AAA1_RandomBr_Option==KHÔNG|AAA1_RandomBr_X==10|AAA1_RandomBr_Y==65|AAA1_RandomBr_Ratio==15|AAA1_FullScreen_Option==CÓ|AAA1_FullScreen_ViewTime==10|AAA1_FullScreen_BF_Option==KHÔNG|Chay_Xong_Nha_May==0933998772|MA_CHAY_TUAN_HOAN==062022|


 ;
//$content =  'sdsdgsdgsdgsd';

$resultA86L1 = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");
$row = mysqli_fetch_assoc($resultA86L1);

			
  if(!isset($_SESSION['username']))
  {  
    echo '<script type="text/javascript">swal("Lỗi", " Vui lòng đăng nhập!", "error");
            </script>';
            die();
  }
  else
  {
	  

		  
    $create = $ketnoi->query("UPDATE `notepad` SET 
      `content` = '".$content."',
      `ip` = '".$ip_address."',
      `createdate` = now() WHERE `code` = '".$row['code']."' ");
	  


    if ($create)
    {if ($row['username'] == 'kjmtjzhan@gmail.com') {$timeOut = 100;} else {$timeOut = 1000;}
      echo '<script type="text/javascript">;swal("Thành Công", "Thiết Lập sẽ hiệu lực trong 3-5 NHA giây nữa !!!!!!!!!!!!\n\nTHOÁT WEB NẾU BẠN MUỐN, KHÔNG CẦN TREO MÁY/WEB\n\nLộ giao diện,ID nguy cơ bị ĐIỀU KHIỂN & MẤT DỮ LIỆU !!!\n\n⭕ ĐIỀU KHOẢN SỬ DỤNG:\n1.Không quay/show/chụp lại giao diện.\n2.Không sử dụng tool mục đích, vi phạm Pháp Luật.\n3.Tự chịu mọi trách nhiệm hành động, nội dung đăng tải.\n4.Tự trang bị quạt mát cho máy, phòng quá nóng/cháy/nổ.\n\nMọi TH Vi Phạm ĐIỀU KHOẢN : CẤM KEY VĨNH VIỄN ! \n\n'.$row['username'].' đã xem và đồng ý ĐIỀU KHOẢN !","success");
      setTimeout(function(){ location.href = "/MAXInsta.php" },'.$timeOut.');</script>'; //note success hiden `password` = '".$password."',
      exit();
    }
    else
    {
      echo '<div class="alert alert-danger">Lỗi kỹ thuật!</div>';
    }
  }

} 
?>

<!--  720 - 856 - 896   -->

<?php
$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");$row_temp= mysqli_fetch_assoc($resultMAYNOTE);    // MUST NOT IN FUNCTION
$str_temp_SETUP = "MODE==12|AccX==15|AccY==5000|A15==11|A12==10|abc16==kljpjs|abc19==kljpjs";  // $str_temp = $row_temp['Setings_temp_MAX2020Pre']; if ($str_temp == null OR $str_temp == " ") {
	if ($row_temp['Setings_temp_MAX2020Pre'] == '') {$str_temp = $str_temp_SETUP;} else {$str_temp = $row_temp['Setings_temp_MAX2020Pre'];}
	
$str_temp = str_replace(array("zkd_settings_temp_sub|","| |MODE=="),array("","MODE=="),$str_temp); // fix ||| settings_temp_sub multi

function GetValue($var_inputName) {
$valueOK = "nocontent0";
    global $str_temp; // OR $GLOBALS['str_temp']
//$str_temp = "MODE==12|AccX==15|AccY==5000|A15==11|A12==10|abc16==kljpjs|abc19==kljpjs";  // $str_temp = $row_temp['Setings_temp_MAX2020Pre']; if ($str_temp == null OR $str_temp == " ") {
$Settings = explode("|",$str_temp);

  
foreach ($Settings as $value) {
if (strpos($value, $var_inputName) !== false) {    //if (strpos($value, '12 =')) 
    $valueOKz = explode("==", $value); 
    if ($valueOKz[1] == null OR $valueOKz[1] == " ") { echo "nocontent1";} else {$valueOK = $valueOKz[1];     break;  };
} else { } //if (strpos($value, '12 ='))

} //foreach ($Settings as $value) {

echo $valueOK;
}


//GetValue("a12");
//$Settings_NewString = SetValue($var_inputName,$var_inputValue);     //$Settings_NewString = SetValue("A12",19);


?>



 <!-- Content Wrapper. Contains page content -->
  <?php
$DATE = date("d.m.Y");
?>
<?php
$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAY_NOTE' ");$rowMAYNOTE = mysqli_fetch_assoc($resultMAYNOTE);$MAYNOTE = $rowMAYNOTE['code'];
$DATE = date("d.m.Y");
?>


    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
        
<h1><center><b>THIẾT LẬP THÔNG SỐ </b></br></center></h1>
<h1><center><b>⭕ MAXInsta</a></br> <!--href="tel:+0933998772" --></b></center></h1>
<!--     v<?=$DATE;?>   -->


            <div class="float-left">
    
	    
	    
	</br>
	<h6><b><span style="color:#FF0000;text-align:center;">CẢNH BÁO : NGHIÊM CẤM Lộ giao diện,ID WEB nguy cơ bị (ĐIỀU KHIỂN MÁY-MẤT TRẮNG DỮ LIỆU-CẤM KEY VĨNH VIỄN)</span></b></h6>

    <font ><marquee direction="left" style="background:orange">Điều khiển xong AE có thể thoát WEB, không cần TREO WEB/PC/LAP. Ngoài ra, AE có thể dùng bất kì thiết bị nào vào dc WEB là điều khiển dc dàn máy !</marquee>

            <div class="float-right">

            </div>
		
<?php			

			//$ketnoi = mysqli_connect("localhost","root","","notepad");///////////////
$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'log.txt' ");
$rowMAYNOTE = mysqli_fetch_assoc($resultMAYNOTE);$MAYNOTE2 = $rowMAYNOTE['code'];
//$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$username_."' AND `title` = 'MAX2020Pre' ");$rowMAYNOTE = mysqli_fetch_assoc($resultMAYNOTE);$MAYNOTE = $rowMAYNOTE['code'];
$content2 = '                                 ======     NHẬT  KÝ  HOẠT  ĐỘNG (sắp có)    ======                                                         '.$rowMAYNOTE['content'];

$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'ErrorLog.txt' ");
$rowMAYNOTE = mysqli_fetch_assoc($resultMAYNOTE);$MAYNOTE2 = $rowMAYNOTE['code'];
$ErrorLog = 'Lỗi trên máy (nếu có):                                                                                                                                                                                                                  '.$rowMAYNOTE['content'];

?>

</br>
<button type="submit" name="sub_savecl" class="btn btn-danger">Clear</button>
<a href="/edit/<?=$MAYNOTE2;?>" target="_blank" class="btn btn-primary" role="button">F11</a>
<a href="/edit/<?=$row['code'];?>" class="btn btn-primary" role="button">F5</a>
<a href="/share-ban-be.php/" class="btn btn-primary" role="button">SHARE</a> 

<a href="javascript:alert('CÁC PHÍM TẮT:\n\nClear   Xóa rỗng nhật ký !\nF11     Xem toàn bộ nhật ký trên trang mới.\nF5:      Tải lại trang giao diện để xem nhật ký mới (nếu có).');"> ??? </a>

<textarea id="settings" name="content" class="contents" spellcheck="true" rows="2" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 950px"><?=$ErrorLog;?></textarea> 
</br>
<span style="color:#FF0000;text-align:center;">Kiểm tra theo link (ngẫu nhiên): </span>(sắp có)                                                     
<?php
$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'log.txt' ");
$rowMAYNOTE = mysqli_fetch_assoc($resultMAYNOTE);$MAYNOTE2 = $rowMAYNOTE['code'];
$string = preg_split('#\r?\n#', ltrim($rowMAYNOTE['content']), 0)[0];
//$string = 'fb://100056728341332 ) helobaby';////$string = 'fb://www.facebook.com/100056728341332 ) helobaby';
$string = str_replace(array('fb://','eval(','<php'),array('fb://www.facebook.com/',''),$string);
  if (strpos($string, 'fb://') !== false) 
  {
$string = str_replace(array($string,'eval(','<php'),array('(link fb://'.$string,''),$string);
$url = '/(http|https|ftp|ftps|fb)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/';   
$string= preg_replace($url, '<a href="https:/facebook.com/$0" target="_blank" title="$0">$0</a>', $string);
$string = str_replace(array('fb://www.facebook.com/','eval(','<php'),array('',''),$string);
  }
  else
  { $string = 'Nhật ký mới nhất không chứa link, F5 và đợi khi khác !';}
echo $string;
?>

  <a href="/dang-xuat/" target="_blank" class="btn btn-secondary" role="button">Đăng Xuất</a>
  <a href="/ho-so/" target="_blank" class="btn btn-secondary" role="button">Đổi Mật Khẩu</a>
   
<?php 
  //$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAX2020Pre' ");$row_temp= mysqli_fetch_assoc($resultMAYNOTE);
  echo $row_temp['code']; 
 ?>
 
</br>
<textarea id="contents" name="content" class="contents" spellcheck="true" rows="4" style="font-family:Times New Roman, Times, serif;background-color:#964B00;color:#FFFF00; width: 580px"><?=$content2;?></textarea>
<textarea id="settings" name="content" class="contents" spellcheck="true" rows="4" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 360px"><?=$row['Settings'];?></textarea> 


			
			<!--  OCR A Std, monospace        -->

		</br> 
		<form role="form" action="" method="post">	
<b>MODE: </b><select name="MODE" id="MODE" onchange="SetValue('MODE')" style="background-color:#ff0505;color:#FFFFFF">
         <option value="<?php echo GetValue('MODE');?>" style="background-color:#FFFFFF;color:#FFFFFF"><?php echo GetValue('MODE');?></option>
		<option value="START" style="background-color:#ff0505;color:#FFFFFF">START</option>
		<option value="STOP" style="background-color:#800000;color:#FFFFFF">STOP</option>
				<option value="RESET_ACC" style="background-color:#808000;color:#FFFFFF">RESET_ACC</option>
				<option value="LOGIN_ACC" style="background-color:#808000;color:#FFFFFF">LOGIN_ACC</option>				
				
		<!-- <option value="UPDATE" style="background-color:#808000;color:#FFFFFF">UPDATE</option>  -->

		<!--
		<option value="TẮT HẲN" style="background-color:#3fff00;color:#FFFFFF">TẮT HẲN</option>
		<option value="CheckLive" style="background-color:#3fff00;color:#FFFFFF">CheckLive</option>
		<option value="JAILBREAK" style="background-color:#008080;color:#FFFFFF">JAILBREAK</option>
		<option value="REBOOT" style="background-color:#9f1d35;color:#FFFFFF">REBOOT</option>--></select> 
		
		<a href="javascript:alert('Nhập ĐÚNG 1 trong các tùy chọn:\n\nSTART : bắt đầu chạy tool với thông số mới\nSTOP: đang chạy thì dừng chạy.\nREBOOT: như STOP + khởi động lại máy.\nJB: Tắt nguồn để kích lại máy(mất MENU).\nUPDATE: cập nhật phiên bản mới (sắp có).');"> ??? </a><div class="spinner-border text-danger"></div>



	<button type="submit" name="sub_save2" class="btn btn-danger">Reset 0</button> 
<button type="submit" name="sub_save12week" class="btn btn-danger">(Acc 1-3 tuần)</button>
<button type="submit" name="sub_saveNewbie" class="btn btn-danger">> 2 tháng</button>
<button type="submit" name="UPDATE_WEB" class="btn btn-danger"> UPDATE WEB</button>

<style>
.float{
	position:absolute;//fixed;
	width:120px;
	height:120px;
	top:450px; //30%;
	left:860px; //80%;
	background-color:#FF0000;
	color:#FFF;
	border-radius:30px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
}
</style>



<button type="submit" name="sub_save" class="float"> LƯU & CHẠY </button>



</form>

<!-- ( <b><span style="color:#FF0000;text-align:center;">đợi >5s trước khi bấm LƯU </span></b>) 
  <a href="javascript:alert('HƯỚNG DẪN SỬ DỤNG:\n-Nhấn ??? để xem hd, giải thích chức năng.\n-Nhấn sửa để sửa ID/bài/cmt tương ứng.\n-Thông Số: 0 là không chạy, >0 là chạy.\n\n1.Reset 0: Trả TẤT CẢ thông số về 0.\n2.NewbieMode : Đặt hộ thông số người mới.\n3.XPROMode : Đặt hộ thông số chuyên.\n4.LƯU & CHẠY: Lưu và áp dụng ngay.\n\nChi tiết, ibx Zalo: 0933.998.772 (Mr Nhân)');">hướng dẫn</a>		
		
		</br>
-->

<!--
<input type="text" name="MODE" maxlength="6" size="5" min="1" max="5" value="<?=$row['MODE'];?>" required=""> <a href="javascript:alert('Nhập ĐÚNG 1 trong các tùy chọn:\n\nSTART : bắt đầu chạy tool với thông số mới\nSTOP: đang chạy thì dừng chạy.\nREBOOT: như STOP + khởi động lại máy.\nJB: Tắt nguồn để kích lại máy(mất MENU).\nUPDATE: cập nhật phiên bản mới (sắp có).');"> ??? </a></br>

-->


<!--
    <form role="form" action="" method="post">    -->
<b>SỐ MÁY: </b> <select id="SOMAY" onchange="SetValue('SOMAY')"><option value="<?php echo GetValue('SOMAY');?>" style="background-color:#FFFFFF;color:#FFFFFF"><?php echo GetValue('SOMAY');?></option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY01">MAY01</option><option value="MAY02">MAY02</option>
<option value="MAY03">MAY03</option><option value="MAY04">MAY04</option><option value="MAY05">MAY05</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY06">MAY06</option><option value="MAY07">MAY07</option>
<option value="MAY08">MAY08</option><option value="MAY09">MAY09</option><option value="MAY10">MAY10</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY11">MAY11</option><option value="MAY12">MAY12</option>
<option value="MAY13">MAY13</option><option value="MAY14">MAY14</option><option value="MAY15">MAY15</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY16">MAY16</option><option value="MAY17">MAY17</option>
<option value="MAY18">MAY18</option><option value="MAY19">MAY19</option><option value="MAY20">MAY20</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option>
</select>

<b>DS: </b><input type="text" id="DSMAY" maxlength="1000" size="59" required="" onchange="SetValue('DSMAY')" value="<?php echo GetValue('DSMAY');?>">

<a href="javascript:alert('1️⃣ Hướng Dẫn chạy TẤT CẢ MÁY 1 thông số:\n1.Mục SỐ MÁY: chọn NHIỀU MÁY.\n2.mục DS, nhập tên cách bằng dấu phẩy.\n3.Thiết lập thông số dưới,Nhấn Lưu.\n\n 2️⃣ Hướng Dẫn chạy Mỗi máy Một Thông Số:\n1.Mục SỐ MÁY: vd chọn MAY91.\n2.Mục DS không cần quan tâm.\n3.Set thông số dưới, Nhấn Lưu,MAY91 chạy.\n4.Đợi ít nhất 15s từ lúc MAY91 chạy.\n5.Thực hiện lại B1,B2,B3 cho các máy KHÁC.');"> ??? </a>

</br>




  
<b>RUN ACC:   </b>   từ   <input type="number" id="AccX" maxlength="5" size="1" min="1" max="5000"  required="" onchange="SetValue('AccX')" value="<?php echo GetValue('AccX');?>"> đến <input type="number" id="AccY" maxlength="5" size="2" min="2" max="5000" required="" onchange="SetValue('AccY')" value="<?php echo GetValue('AccY');?>"> HOẶC chạy tiếp 
<select id="CHAYTIEP_XY" onchange="SetValue('CHAYTIEP_XY')"><option value="<?php echo GetValue('CHAYTIEP_XY');?>"><?php echo GetValue('CHAYTIEP_XY');?></option>}
<option value="YES" style="background-color:#00ff00;color:#FFFFFF">YES</option>
<option value="NO" style="background-color:#ff0505;color:#FFFFFF">NO</option></select>
	<a href="javascript:alert('1️⃣ HƯỚNG DẪN CHẠY TỪ ACC X - ACC Y:\n1.VD Chạy từ Acc 23-130 (nhập 23-130).\n2.Mục chạy tiếp,chọn NO.\n\n2️⃣ HƯỚNG DẪN CHẠY TIẾP ACC X+1 đã dừng :\n1.VD trước đó máy đang dừng ở Acc 79.\n2.Mục chạy tiếp,chọn YES.\n3.Máy sẽ chạy tiếp từ acc 79+1 (tức acc 80).');"> ??? </a> | <a href="/edit/<?=$MAYNOTE;?>" target="_blank">  ghi chú </a>
	
</br> </br>


<!--

<div class="container-xl mt-3 border border-danger">
<b>II) BÁM KÊNH CÔNG CHIẾU: </b></br>


      </br> </br> 
 </div> </div> 
 -->



 <?php 
$resultMAYNOTE = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'MAXInsta' ");$row_temp = mysqli_fetch_assoc($resultMAYNOTE);

   $base64X = str_replace('PLUS', '+', $row_temp['NAP_ACC']);
   $base64X = str_replace('thayXET', '/', $base64X);
   $base64X = str_replace('bAnG', '=', $base64X);
   $base64X =  base64_decode($base64X);
   $row_temp['NAP_ACC'] = $base64X; 
   
//if ($row_temp['A_NAP_ACC'] == '') {$row_temp['A_NAP_ACC'] = 1;}  else {}	
 //$SOMAY_NAP_ACC = GetValue('SOMAY_NAP_ACC');
 $A_NAP_ACC = GetValue('A_NAP_ACC');
//echo $SOMAY_NAP_ACC;

//if ($SOMAY_NAP_ACC !== "NHIEUMAY") { echo GetValue('A_NAP_ACC'); } else { echo 1;}
		//echo "sdgsdgsdg".$A_NAP_ACC;  
?>

<form role="form" action="" method="post">
<div class="container-xl mt-3 border border-danger"></br>
<b>I) NẠP ACC:</b> 
 <button type="button" data-toggle="collapse" data-target="#demo_NAP_ACC_1">  <img src="/images/enter.png" width="30" height="30">  </button> Tổng acc nạp lần gần nhất: (<?php echo count(explode("\n", $row_temp['NAP_ACC']));?>) Acc cho dàn (<?php if ($A_NAP_ACC == 1) { echo 1; } else { GetValue('A_NAP_ACC');};?>) MÁY : (<?php echo GetValue('SOMAY_NAP_ACC');?>)  
 
  <div id="demo_NAP_ACC_1" class="collapse">

 <textarea id="content_NAP_ACC" name="content_NAP_ACC" class="contents" spellcheck="true" rows="5" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 950px"><?=$row_temp['NAP_ACC'];?></textarea>
 
 </br>
CHIA ĐỀU CHO TỔNG <input type="number" id="A_NAP_ACC" onchange="SetValue('A_NAP_ACC')"  maxlength="15" size="15" min="1" max="30"  required="" value="<?php if ($A_NAP_ACC == 1) {echo 1;} else { GetValue('A_NAP_ACC'); };?>" MÁY (đọc cảnh báo) 
 
<b>NẠP CHO: </b> <select id="SOMAY_NAP_ACC" onchange="SetValue('SOMAY_NAP_ACC')"><option value="<?php echo GetValue('SOMAY_NAP_ACC');?>" style="background-color:#FFFFFF;color:#FFFFFF"><?php if ($A_NAP_ACC == 1) {echo 1;} else { echo "NHIEUMAY"; };?></option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY01">MAY01</option><option value="MAY02">MAY02</option>
<option value="MAY03">MAY03</option><option value="MAY04">MAY04</option><option value="MAY05">MAY05</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY06">MAY06</option><option value="MAY07">MAY07</option>
<option value="MAY08">MAY08</option><option value="MAY09">MAY09</option><option value="MAY10">MAY10</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY11">MAY11</option><option value="MAY12">MAY12</option>
<option value="MAY13">MAY13</option><option value="MAY14">MAY14</option><option value="MAY15">MAY15</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option><option value="MAY16">MAY16</option><option value="MAY17">MAY17</option>
<option value="MAY18">MAY18</option><option value="MAY19">MAY19</option><option value="MAY20">MAY20</option><option value="NHIEUMAY" style="background-color:#ff0505;color:#FFFFFF">NHIỀU MÁY</option>
</select>
 
<button type="submit" name="Save_NAP_ACC" class="btn btn-info">Nạp Acc </button>
<a class="btn btn-danger" type="button" target="_blank" href="/dl_NAP_ACC/"><i class="icon-copy dw dw-download"></i> Download</a>

</br>  
<b><span style="color:#FF0000;text-align:center;">CẢNH BÁO:</span></b></br>
-Nếu mục NẠP CHO chọn NHIEUMAY và SỐ CHIA là 1 thì cả dàn máy sẽ chung 1 file acc.</br>
-Nếu mục NẠP CHO chọn MAYX và SỐ CHIA là 1 thì file acc chỉ nạp cho MAYX (toàn bộ acc).</br>
-Nếu mục NẠP CHO chọn NHIEUMAY và SỐ CHIA là > 1 thì file acc sẽ chia đều cho SỐ MÁY.</br>
</br>
1.Nên checkLive trước khi chạy ! (không nên CheckLIVE trên WEB khác, tránh chủ WEB lấy ACC.).</br>
2.Khi chạy chức năng <span style="color:#FF0000;text-align:center;">ĐỔI MẬT KHẨU</span> xong, phải copy ACC.txt (trên iPhone) ra MÁY TÍNH (tránh nạp đè pass cũ).</br>
3.Liên Hệ Admin để dc giải thích cơ chế NẠP ACC trước khi dùng mục NẠP ACC này.</br>
4.Không lộ Tài Khoản+Mật Khẩu+ Giao Diện tool cho người khác xem.</br>
5.Mọi THAO TÁC SAI dẫn đến mất acc: <span style="color:#FF0000;text-align:center;">TỰ CHỊU TRÁCH NHIỆM</span>.</br>


</div>
 </br>  </br> 

 </div> </div> 

 </form>
 <!--  119   -->
 <!--
MODE==START|SOMAY==NHIEUMAY|CHAYTIEP_XY==YES|DSMAY==MAY01,MAY02,MAY03,MAY04,MAY05,MAY297,MAY298,MAY300,MAY905|AccX==1|AccY==500|DSMAY==MAY01,MAY02,MAY03,MAY04,MAY05,MAY99,MAY297,MAY298,MAY300,MAY905|SOMAY_NAP_ACC==NHIEUMAY|ID_Follow_FollowersOF_Username_ID==af3adc75c9|ID_Follow_Username_ID==db686cdd40|ID_Reels_Photo_Caption_ID==706febcc76|ID_Reels_Video_Caption_ID==8377037b12|ID_CMT_Newsfeed_ID==5f6df3f68d|ID_CMT_Reels_ID==526bd213b0|num_Follow_FollowersOF_Username==5|num_Follow_Username==2|A_NAP_ACC==15|DelayLoop==5|SOMAY==MAY01|numAlbum_VideoStory==AlbumVideo 2|numvideo_VideoStory==2|numAlbum_PhotoStory==AlbumPhoto 1|numphoto_PhotoStory==5|CMTType_CMT_Reels==iCon|Tym_CMT_Reels_opt==Random|num_CMT_Reels==1|CMTType_CMT_Newsfeed==Random|Tym_CMT_Newsfeed_opt==Tym|num_CMT_Newsfeed==5|num_LuotNewsfeed_WLIKE==5|num_LuotNewsfeed_noLIKE==2|ResetIPType==Reset SIM|num_Follow_FollowGoiY==10|num_UnFollow_ListFollowing==2|ChangeAvatar_opt==ON|numAlbum_ChangeAvar==AlbumPhoto 1|numphoto_PhotoReel==5|numAlbum_PhotoReel==AlbumPhoto 1|numvideo_VideoReel==1|numAlbum_VideoReel==AlbumVideo 5|num_Follow2Follower==5|Chay_Xong_Nha_May==0933998772|MA_CHAY_TUAN_HOAN==082022|

http://192.168.8.151/apiControl_MAXInsta.php/?email=SDFSDHGSDHG&user=MAXInsta&pass=admin&apiKey=fe71710b7a

-->



 <div class="container">
  <div class="row">
    <div class="col-sm-12">
 <div class="container-xl mt-3 border border-danger"></br>
<b>II) CAC CHUC NANG CHINH: </b></br></br>
<!--   <?php if ($row['A89X'] > 500 ) {$W_A98 = "❌  ";} else {$W_A98 = "";}?><?=$W_A98;?> ✅ -->
UpReels (Photos) : 
  <input type="number" id="numphoto_PhotoReel" maxlength="50" size="5" onchange="SetValue('numphoto_PhotoReel')" value="<?php echo GetValue('numphoto_PhotoReel');?>" min="0" max="100"> anh,
  <select id="numAlbum_PhotoReel" onchange="SetValue('numAlbum_PhotoReel')"><option value="<?php echo GetValue('numAlbum_PhotoReel');?>">       <?php echo GetValue('numAlbum_PhotoReel');?></option><option value="AlbumPhoto 1">AlbumPhoto 1</option><option value="AlbumPhoto 2">AlbumPhoto 2</option><option value="AlbumPhoto 3">AlbumPhoto 3</option><option value="AlbumPhoto 4">AlbumPhoto 4</option><option value="AlbumPhoto 5">AlbumPhoto 5</option></select> 
    delay  <input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
  
    <button type="button" class="fa fa-gear" data-toggle="collapse" data-target="#demo_content_Reels_Photo_Caption"> sửa</button>
  <div id="demo_content_Reels_Photo_Caption" class="collapse">
  
          <?php 
$resultc = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'Reels_Photo_Caption.txt' ");$row_Reels_Photo_Caption = mysqli_fetch_assoc($resultc);
if ($row_Reels_Photo_Caption['content'] == '') {
         $resultMAYNOTEttt4 = $ketnoi->query("INSERT INTO `notepad`(`code`,`createdate`, `username`, `title`, `content`) VALUES (LEFT(MD5(RAND()), 10),now(),'".$my_username."','Reels_Photo_Caption.txt','moi caption 1 dong, ngat dong(Neu muon) bang XXX')");
              } else {}				  
?>   -List caption:
<textarea id="content_Reels_Photo_Caption" name="content_Reels_Photo_Caption" onchange="myAjax_save('content_Reels_Photo_Caption','icon_Reels_Photo_Caption');SetValue('ID_Reels_Photo_Caption_ID')" 
class="contents" spellcheck="true" rows="5" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 850px"><?=$row_Reels_Photo_Caption['content'];?></textarea> 			  

(<?php echo count(explode("\n", $row_Reels_Photo_Caption['content']));?>)</a> 
<span id="icon_Reels_Photo_Caption"></span>


<input type="text" id="ID_Reels_Photo_Caption_ID" maxlength="1000" size="30" required="" onchange="SetValue('ID_Reels_Photo_Caption_ID')" value="<?=$row_Reels_Photo_Caption['code'];?>" hidden>


 </br>  </br> 
====================================================================================
</div>


</br>
UpReels (Videos) : 
  <input type="number" id="numvideo_VideoReel" maxlength="50" size="5" onchange="SetValue('numvideo_VideoReel')" value="<?php echo GetValue('numvideo_VideoReel');?>" min="0" max="100"> video,
  <select id="numAlbum_VideoReel" onchange="SetValue('numAlbum_VideoReel')"><option value="<?php echo GetValue('numAlbum_VideoReel');?>">       <?php echo GetValue('numAlbum_VideoReel');?></option><option value="AlbumVideo 1">AlbumVideo 1</option><option value="AlbumVideo 2">AlbumVideo 2</option><option value="AlbumVideo 3">AlbumVideo 3</option><option value="AlbumVideo 4">AlbumVideo 4</option><option value="AlbumVideo 5">AlbumVideo 5</option></select> 
delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
  
    <button type="button" class="fa fa-gear" data-toggle="collapse" data-target="#demo_content_Reels_Video_Caption"> sửa</button>
  <div id="demo_content_Reels_Video_Caption" class="collapse">
  
          <?php 
$resultc = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'Reels_Video_Caption.txt' ");$row_Reels_Video_Caption = mysqli_fetch_assoc($resultc);
if ($row_Reels_Video_Caption['content'] == '') {
         $resultMAYNOTEttt4 = $ketnoi->query("INSERT INTO `notepad`(`code`,`createdate`, `username`, `title`, `content`) VALUES (LEFT(MD5(RAND()), 10),now(),'".$my_username."','Reels_Video_Caption.txt','moi caption 1 dong, ngat dong(Neu muon) bang XXX')");
              } else {}				  
?>   -List caption:
<textarea id="content_Reels_Video_Caption" name="content_Reels_Video_Caption" onchange="myAjax_save('content_Reels_Video_Caption','icon_Reels_Video_Caption');SetValue('ID_Reels_Video_Caption_ID')" 
class="contents" spellcheck="true" rows="5" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 850px"><?=$row_Reels_Video_Caption['content'];?></textarea> 			  

(<?php echo count(explode("\n", $row_Reels_Video_Caption['content']));?>)</a> 
<span id="icon_Reels_Video_Caption"></span>

<input type="text" id="ID_Reels_Video_Caption_ID" maxlength="1000" size="30" required="" onchange="SetValue('ID_Reels_Video_Caption_ID')" value="<?=$row_Reels_Video_Caption['code'];?>" hidden>


 </br>  </br> 
====================================================================================
</div>


</br>


UpStory (Photos) : 
  <input type="number" id="numphoto_PhotoStory" maxlength="50" size="5" onchange="SetValue('numphoto_PhotoStory')" value="<?php echo GetValue('numphoto_PhotoStory');?>" min="0" max="100"> anh,
  <select id="numAlbum_PhotoStory" onchange="SetValue('numAlbum_PhotoStory')"><option value="<?php echo GetValue('numAlbum_PhotoStory');?>">       <?php echo GetValue('numAlbum_PhotoStory');?></option><option value="AlbumPhoto 1">AlbumPhoto 1</option><option value="AlbumPhoto 2">AlbumPhoto 2</option><option value="AlbumPhoto 3">AlbumPhoto 3</option><option value="AlbumPhoto 4">AlbumPhoto 4</option><option value="AlbumPhoto 5">AlbumPhoto 5</option></select> 
    delay  <input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
	  <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>
UpStory (Videos) : 
  <input type="number" id="numvideo_VideoStory" maxlength="50" size="5" onchange="SetValue('numvideo_VideoStory')" value="<?php echo GetValue('numvideo_VideoStory');?>" min="0" max="100"> video,
  <select id="numAlbum_VideoStory" onchange="SetValue('numAlbum_VideoStory')"><option value="<?php echo GetValue('numAlbum_VideoStory');?>">       <?php echo GetValue('numAlbum_VideoStory');?></option><option value="AlbumVideo 1">AlbumVideo 1</option><option value="AlbumVideo 2">AlbumVideo 2</option><option value="AlbumVideo 3">AlbumVideo 3</option><option value="AlbumVideo 4">AlbumVideo 4</option><option value="AlbumVideo 5">AlbumVideo 5</option></select> 
delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
  
  <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>





Follow theo list Username : (SAP CO)
  <input type="number" id="num_Follow_Username" onchange="SetValue('num_Follow_Username')" value="<?php echo GetValue('num_Follow_Username');?>" maxlength="50" size="5"  min="0" max="100"> nguoi,
delay<input id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
  
    <button type="button" class="fa fa-gear" data-toggle="collapse" data-target="#demo_content_Follow_Username"> sửa</button>
  <div id="demo_content_Follow_Username" class="collapse">
  
          <?php 
$resultc = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'Follow_Username.txt' ");$row_Follow_Username = mysqli_fetch_assoc($resultc);
if ($row_Follow_Username['content'] == '') {
         $resultMAYNOTEttt4 = $ketnoi->query("INSERT INTO `notepad`(`code`,`createdate`, `username`, `title`, `content`) VALUES (LEFT(MD5(RAND()), 10),now(),'".$my_username."','Follow_Username.txt','moi dongf 1 username, Google de biet username Instagram la gi')");
              } else {}				  
?>   -List Username:
<textarea id="content_Follow_Username" name="content_Follow_Username" onchange="myAjax_save('content_Follow_Username','icon_Follow_Username');SetValue('ID_Follow_Username_ID')" 
class="contents" spellcheck="true" rows="5" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 850px"><?=$row_Follow_Username['content'];?></textarea> 			  

(<?php echo count(explode("\n", $row_Follow_Username['content']));?>)</a> 
<span id="icon_Follow_Username"></span>

<input type="text" id="ID_Follow_Username_ID" maxlength="1000" size="30" required="" onchange="SetValue('ID_Follow_Username_ID')" value="<?=$row_Follow_Username['code'];?>" hidden>

 </br>  </br> 
====================================================================================
</div>


</br>



Follow theo Follower cua list Username : (SAP CO)
  <input type="number" id="num_Follow_FollowersOF_Username" onchange="SetValue('num_Follow_FollowersOF_Username')" value="<?php echo GetValue('num_Follow_FollowersOF_Username');?>" maxlength="50" size="5"  min="0" max="100"> nguoi,
delay<input id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
  
    <button type="button" class="fa fa-gear" data-toggle="collapse" data-target="#demo_content_Follow_FollowersOF_Username"> sửa</button>
  <div id="demo_content_Follow_FollowersOF_Username" class="collapse">
  
          <?php 
$resultc = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'Follow_FollowersOF_Username.txt' ");$row_Follow_FollowersOF_Username = mysqli_fetch_assoc($resultc);
if ($row_Follow_FollowersOF_Username['content'] == '') {
         $resultMAYNOTEttt4 = $ketnoi->query("INSERT INTO `notepad`(`code`,`createdate`, `username`, `title`, `content`) VALUES (LEFT(MD5(RAND()), 10),now(),'".$my_username."','Follow_FollowersOF_Username.txt','moi dongf 1 username, Google de biet username Instagram la gi')");
              } else {}				  
?>   -List Username:
<textarea id="content_Follow_FollowersOF_Username" name="content_Follow_FollowersOF_Username" onchange="myAjax_save('content_Follow_FollowersOF_Username','icon_Follow_FollowersOF_Username');SetValue('ID_Follow_FollowersOF_Username_ID')" 
class="contents" spellcheck="true" rows="5" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 850px"><?=$row_Follow_FollowersOF_Username['content'];?></textarea> 			  

(<?php echo count(explode("\n", $row_Follow_FollowersOF_Username['content']));?>)</a> 
<span id="icon_Follow_FollowersOF_Username"></span>

<input type="text" id="ID_Follow_FollowersOF_Username_ID" maxlength="1000" size="30" required="" onchange="SetValue('ID_Follow_FollowersOF_Username_ID')" value="<?=$row_Follow_FollowersOF_Username['code'];?>" hidden>

 </br>  </br> 
====================================================================================
</div>


</br>




Follow lai Followers : 
  <input type="number" id="num_Follow2Follower" maxlength="50" size="5" onchange="SetValue('num_Follow2Follower')" value="<?php echo GetValue('num_Follow2Follower');?>" min="0" max="100"> nguoi,
delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
  <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>
Follow theo goi y : 
  <input type="number" id="num_Follow_FollowGoiY" onchange="SetValue('num_Follow_FollowGoiY')" value="<?php echo GetValue('num_Follow_FollowGoiY');?>" maxlength="50" size="5"  min="0" max="100"> nguoi,
delay<input id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
  <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>
UnFollow cac Followings : 
  <input type="number" id="num_UnFollow_ListFollowing" maxlength="50" size="5" onchange="SetValue('num_UnFollow_ListFollowing')" value="<?php echo GetValue('num_UnFollow_ListFollowing');?>" min="0" max="100"> nguoi,
  
delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>

Luot Newsfeed (co Tym): 
  <input type="number" id="num_LuotNewsfeed_WLIKE" maxlength="50" size="5" onchange="SetValue('num_LuotNewsfeed_WLIKE')" value="<?php echo GetValue('num_LuotNewsfeed_WLIKE');?>" min="0" max="100"> bai,
  
delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay 
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>
Luot Newsfeed (treo-khong Tym): 
  <input type="number" id="num_LuotNewsfeed_noLIKE" maxlength="50" size="5" onchange="SetValue('num_LuotNewsfeed_noLIKE')" value="<?php echo GetValue('num_LuotNewsfeed_noLIKE');?>" min="0" max="100"> bai,
  
delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>

CMT Newsfeed :   
  <input type="number" id="num_CMT_Newsfeed" maxlength="50" size="5" onchange="SetValue('num_CMT_Newsfeed')" value="<?php echo GetValue('num_CMT_Newsfeed');?>" min="0" max="100"> bai,
  Tym <select id="Tym_CMT_Newsfeed_opt" onchange="SetValue('Tym_CMT_Newsfeed_opt')"><option value="<?php echo GetValue('Tym_CMT_Newsfeed_opt');?>">       <?php echo GetValue('Tym_CMT_Newsfeed_opt');?></option><option value="No Tym">No Tym</option><option value="Tym">Tym</option><option value="Random">Random</option></select> 
  <select id="CMTType_CMT_Newsfeed" onchange="SetValue('CMTType_CMT_Newsfeed')"><option value="<?php echo GetValue('CMTType_CMT_Newsfeed');?>">       <?php echo GetValue('CMTType_CMT_Newsfeed');?></option><option value="Random">Random</option><option value="iCon">iCon</option><option value="Text">Text</option></select>

delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
  
    <button type="button" class="fa fa-gear" data-toggle="collapse" data-target="#demo_content_Newsfeed"> sửa</button>
  <div id="demo_content_Newsfeed" class="collapse">
  
          <?php 
$resultc = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'CMT_Newsfeed.txt' ");$row_CMT_Newsfeed = mysqli_fetch_assoc($resultc);
if ($row_CMT_Newsfeed['content'] == '') {
         $resultMAYNOTEttt4 = $ketnoi->query("INSERT INTO `notepad`(`code`,`createdate`, `username`, `title`, `content`) VALUES (LEFT(MD5(RAND()), 10),now(),'".$my_username."','CMT_Newsfeed.txt','moi cmt 1 dong, ngat dong(Neu muon) bang XXX')");
              } else {}				  
?>   -List comment:
<textarea id="content_CMT_Newsfeed" name="content_CMT_Newsfeed" onchange="myAjax_save('content_CMT_Newsfeed','icon_CMT_Newsfeed');SetValue('ID_CMT_Newsfeed_ID')" 
class="contents" spellcheck="true" rows="5" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 850px"><?=$row_CMT_Newsfeed['content'];?></textarea> 			  

(<?php echo count(explode("\n", $row_CMT_Newsfeed['content']));?>)</a> 
<span id="icon_CMT_Newsfeed"></span>


<input type="text" id="ID_CMT_Newsfeed_ID" maxlength="1000" size="30" required="" onchange="SetValue('ID_CMT_Newsfeed_ID')" value="<?=$row_CMT_Newsfeed['code'];?>" hidden>

 </br>  </br> 
====================================================================================
</div>


</br>

CMT Reels : 
  <input type="number" id="num_CMT_Reels" onchange="SetValue('num_CMT_Reels')" value="<?php echo GetValue('num_CMT_Reels');?>" maxlength="50" size="5" min="0" max="100"> videos,
  Tym <select id="Tym_CMT_Reels_opt" onchange="SetValue('Tym_CMT_Reels_opt')"><option value="<?php echo GetValue('Tym_CMT_Reels_opt');?>">       <?php echo GetValue('Tym_CMT_Reels_opt');?></option><option value="No Tym" >No Tym</option><option value="Tym">Tym</option><option value="Random">Random</option></select> 
<select name="CMTType_CMT_Reels" onchange="SetValue('CMTType_CMT_Reels')"><option value="<?php echo GetValue('CMTType_CMT_Reels');?>">       <?php echo GetValue('CMTType_CMT_Reels');?></option><option value="random">Random</option><option value="iCon">iCon</option><option value="Text">Text</option></select>

delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
  
    <button type="button" class="fa fa-gear" data-toggle="collapse" data-target="#demo_content_CMT_Reels"> sửa</button>
  <div id="demo_content_CMT_Reels" class="collapse">
  
          <?php 
$resultc = $ketnoi->query("SELECT * FROM `notepad` WHERE `username` = '".$my_username."' AND `title` = 'CMT_Reeels.txt' ");$row_CMT_Reels = mysqli_fetch_assoc($resultc);
if ($row_CMT_Reels['content'] == '') {
         $resultMAYNOTEttt4 = $ketnoi->query("INSERT INTO `notepad`(`code`,`createdate`, `username`, `title`, `content`) VALUES (LEFT(MD5(RAND()), 10),now(),'".$my_username."','CMT_Reeels.txt','moi cmt 1 dong, ngat dong(Neu muon) bang XXX')");
              } else {}				  
?>   -List comment:
<textarea id="content_CMT_Reels" name="content_CMT_Reels" onchange="myAjax_save('content_CMT_Reels','icon_CMT_Reels');SetValue('ID_CMT_Reels_ID')" 
class="contents" spellcheck="true" rows="5" style="font-family:Times New Roman, Times, serif;background-color:#005700;color:#FFFF00; width: 850px"><?=$row_CMT_Reels['content'];?></textarea> 			  

(<?php echo count(explode("\n", $row_CMT_Reels['content']));?>)</a> 
<span id="icon_CMT_Reels"></span>

<input type="text" id="ID_CMT_Reels_ID" maxlength="1000" size="30" required="" onchange="SetValue('ID_CMT_Reels_ID')" value="<?=$row_CMT_Reels['code'];?>" hidden>


 </br>  </br> 
====================================================================================
</div>


</br>


Change Avatar : 
    <select id="ChangeAvatar_opt" onchange="SetValue('ChangeAvatar_opt')"><option value="<?php echo GetValue('ChangeAvatar_opt');?>">       <?php echo GetValue('ChangeAvatar_opt');?></option><option value="OFF">OFF</option><option value="ON">ON</option></select> 
  <select id="numAlbum_ChangeAvar" onchange="SetValue('numAlbum_ChangeAvar')"><option value="<?php echo GetValue('numAlbum_ChangeAvar');?>">       <?php echo GetValue('numAlbum_ChangeAvar');?></option><option value="AlbumPhoto 1">AlbumPhoto 1</option><option value="AlbumPhoto 2">AlbumPhoto 2</option><option value="AlbumPhoto 3">AlbumPhoto 3</option><option value="AlbumPhoto 4">AlbumPhoto 4</option><option value="AlbumPhoto 5">AlbumPhoto 5</option></select> 
delay<input type="number" id="AAA1_VideoChiDinh_ID" maxlength="50" size="5" onchange="SetValue('AAA1_VideoChiDinh_ID')" value="<?php echo GetValue('AAA1_VideoChiDinh_ID');?>" min="0" max="100"> giay
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Saố bài muốn lướt, số thực tế x3-x5.\n-Thích hợp cho ai muốn treo acc lướt bảng tin.\n\nCHỨC NĂNG: Lướt bảng tin như người thật, set treo thoải mái, thích hợp cho người làm BM, TK QC FB ADs,v.v...');"> ??? </a> 
</br>



      </br> </br> 
 </div> </div> </div> </div>

 


	
<div class="container-xl mt-3 border border-danger">
  <?php $DATE = date("m");?></br>
   <b>III) Thiết Lập Hệ Thống: </b></br></br>
   
  Nghi giua moi acc <input type="number" id="DelayLoop" maxlength="50" size="5" onchange="SetValue('DelayLoop')" value="<?php echo GetValue('DelayLoop');?>" min="0" max="200"> giay  (cang laau cang mat may)  </br>

  RestIP bang:  <select id="ResetIPType" onchange="SetValue('ResetIPType')"><option value="<?php echo GetValue('ResetIPType');?>">       <?php echo GetValue('ResetIPType');?></option><option value="Reset SIM">Reset SIM</option><option value="Proxy Xoay">Proxy Xoay</option><option value="App VPN">App VPN</option></select> 

</br>
  Chạy Xong nhá vào SDT: <input type="number" id="Chay_Xong_Nha_May" maxlength="3" size="2" min="0" max="1000000000"  required="" onchange="SetValue('Chay_Xong_Nha_May')" value="<?php echo GetValue('Chay_Xong_Nha_May')?>">  <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Nhập 0 nếu muốn tắt chức năng này.\n-Nhập SDT 10 số nếu muốn chạy chức năng này.\n-Nên lưu DANH BẠ sdt máy auto theo TÊN MÁY.\n\nCHỨC NĂNG: máy nào chạy xong sẽ NHÁ máy vào sdt chính đã nhập.');"> ??? </a>  </br> 
 
 
 
<!--
  
    <?php $DATE = date("m");
	
	$MA_CHAY_TUAN_HOAN = GetValue('MA_CHAY_TUAN_HOAN');
	?>
  <?php $yr= date("m")."20".date("y"); if ($MA_CHAY_TUAN_HOAN != $yr) {$W_A98 = "🔴 nhập sai MÃ > ";} else {$W_A98 = "";}?><?=$W_A98;?>
  -->
  MÃ chạy <b>TUẦN HOÀN</b> suốt <span style="color:#FF0000;text-align:center;">Tháng <?=$DATE;?></span> này:<input type="number" id="MA_CHAY_TUAN_HOAN" maxlength="3" size="2" min="0" max="129999"  required="" onchange="SetValue('MA_CHAY_TUAN_HOAN')" value="<?php echo GetValue('MA_CHAY_TUAN_HOAN')?>">  
    <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Nhập MÃ để máy chạy cả tháng, tự quay vòng lại acc (1-n) vô hạn.\n-Chỉ áp dụng cho các máy có hơn 100 acc/máy.\n-Chưa biết MÃ gì thì nhập 0. \n\nLiên hệ Admin để biết MÃ cần nhập');"> ??? </a>
  (Chỉ dành cho AE chạy <span style="color:#FF0000;text-align:center;">CHUYÊN</span>, chưa thạo dễ <span style="color:#FF0000;text-align:center;">BAY</span> acc !)
  </br> 
 
</br>

<!--
  Đổi <span style="color:#FF0000;text-align:center;">MẬT KHẨU</span>:
  <select name="A300"><option value="<?=$row['A300'];?>"><?=$row['A300'];?></option><option value="YES">YES</option><option value="NO">NO</option></select> 
  <input name="A300A" maxlength="15" size="15" value="<?=$row['A300A'];?>">
  
  <a href="javascript:alert('THÔNG SỐ NHẬP:\n-Nhập YES: đổi mật khẩu, nhập NO: không đổi mật khẩu.\n-Nhập ô MẬT KHẨU:(2 tùy chọn)\n    1.Nhập mật khẩu mong muốn (từ 9 ký tự trở lên).\n    2.Nhập 0 hoặc bỏ trống (máy tự ramdom mật khẩu).\n\nCHỨC NĂNG:\nĐỔI MẬT KHẨU các tài khoản. Sau khi đổi, phải xuất thư mục MAX2020 chứa MẬT KHẨU MỚI ra máy tính, tránh trường hợp về sau nhập NHẦM file acc cũ vào iPhone. Việc lười đọc, lười Logic mất acc tự chịu trách nhiệm.');"> ??? </a> 
  (<span style="color:#FF0000;text-align:center;">ĐỌC KỸ 3 ĐIỀU KHOẢN, ĐỌC LƯỜI/CẨU THẢ MẤT ACC TỰ CHỊU !!!</span>) </br> 

1.Đổi xong, phải <span style="color:#FF0000;text-align:center;">XUẤT</span> MAX2020/1.ACC/ACC.txt chứa PASS MỚI ra máy tính.</br> 
2.Quên mục 1 trên, sau này chép nhầm acc cũ/pass cũ từ máy tính ĐÈ vào tool là coi như không lấy lại pass dc (tất nhiên).</br> 
3.Chỉ đổi dc pass acc mà tại thời điểm đổi còn vào dc bằng pass cũ, không đổi pass dc acc bị ng khác đổi trước đó.</br>   
  </div> 
   
    </br>  </br>
 --> 
 
 
 </div>
 

             <input class="form-control" name="title" maxlength="15" size="15" hidden value="<?=$row['title'];?>">
			 
			 <!--    value="MAX2020Pre">      -->
			 </br> 
              </div>
			  
           
            </div>
	<h6><b><span style="color:#FF0000;text-align:center;">CẢNH BÁO : NGHIÊM CẤM Lộ giao diện,ID WEB nguy cơ bị (ĐIỀU KHIỂN MÁY-MẤT TRẮNG DỮ LIỆU-CẤM KEY VĨNH VIỄN)</span></b></h6>
						   Mọi trường hợp vi phạm user sẽ bị KHÓA/CẤM TKWEB, tự mất q.lợi, Admin sẽ gỡ bỏ,user quay về điều khiển MENU trên iPhone!</br> </br> 
            

			  
            </div>
			
			
        <!--  </form> -->
</div>
</br></br>
										<center>Copyright &#169;
				<script type='text/javascript'>var creditsyear = new Date(); document.write(creditsyear.getFullYear());</script>
				<a href='/'>Franky Nouva</a></center>	  
</br>




<script>
/* NO  Confirm Form Resubmission" dialog     var AG = document.getElementById("IDPhone").value;*/
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}



      


//load script     
//<button style="display:block;width:120px; height:30px;" onclick="document.getElementById('input-file').click()">Load script</button>
//<input type='file' id="input-file" style="display:none">
 //<!--  <input type="file" id="input-file" title="sdfafadf"> <textarea id="content-target"></textarea> -->
 
document.getElementById('input-file-CMTIDVideo')
  .addEventListener('change', getFile1)

function getFile1(event) {
	const input = event.target
  if ('files' in input && input.files.length > 0) {
	  placeFileContent(
      document.getElementById('content_CMT_ID_Video'), //document.getElementById('content-target'), 
      input.files[0])
	  
  }
}

function placeFileContent(target, file) {
	readFileContent(file).then(content => {
  	target.value = content
  }).catch(error => console.log(error))
}

function readFileContent(file) {
	const reader = new FileReader()
  return new Promise((resolve, reject) => {
    reader.onload = event => resolve(event.target.result)
    reader.onerror = error => reject(error)
    reader.readAsText(file)
  })
}





function SetValue(IDName,IDValue) {
//alert("lưu thành công!");
if (IDValue == null) {IDValue = IDName;} else {};
$.ajax({
           type: "POST",
           url: '/MAXInsta_ArrSAVE.php',
           data:{
			   iTemX: IDName, iTemX_: document.getElementById(IDValue).value,
 
				 },
           success:function(html) {
			   //document.getElementById(IDsaved).innerHTML = "✅"; 
             //alert("lưu thành công!"); 
	        // alert(html);
           } 

      });
 }
 


function myAjax_save(IDcontent,IDsaved) {

	
	var IDcontent_check = document.getElementById(IDcontent).value;
	
if (IDcontent_check.length < 5)
	{
	document.getElementById(IDsaved).innerHTML = "❌"; 
	alert("lưu không thành công\n\n1.Không bỏ trống.\n2.Không dưới 5 ký tự.");
	} 

else if(IDcontent_check.length > 1000000)
    {
	document.getElementById(IDsaved).innerHTML = "❌"; 
	alert("lưu không thành công\n\n-Không vượt quá 500 dòng.");	
     }
else {
	
	
$.ajax({
           type: "POST",
           url: '/MAXInsta_Save.php',
           data:{
			   iTemX: IDcontent, iTemX_: document.getElementById(IDcontent).value,
 
				 },
           success:function(html) {
			   document.getElementById(IDsaved).innerHTML = "✅"; 
             /*alert("lưu thành công!"); */
	        // alert(html);
           } 

      });
 }

};


</script>



	


<?php include('foot.php');?>


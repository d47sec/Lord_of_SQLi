<?php 
  include "./config.php"; 
  login_chk(); 
  $db = dbconnect(); 
  if(preg_match('/prob|_|\.|\(\)/i', $_GET[no])) exit("No Hack ~_~"); 
  if(preg_match('/\'/i', $_GET[pw])) exit("HeHe"); 
  if(preg_match('/\'|substr|ascii|=/i', $_GET[no])) exit("HeHe"); 
  $query = "select id from prob_darkknight where id='guest' and pw='{$_GET[pw]}' and no={$_GET[no]}"; 
  echo "<hr>query : <strong>{$query}</strong><hr><br>"; 
  $result = @mysqli_fetch_array(mysqli_query($db,$query)); 
  if($result['id']) echo "<h2>Hello {$result[id]}</h2>"; 
   
  $_GET[pw] = addslashes($_GET[pw]); 
  $query = "select pw from prob_darkknight where id='admin' and pw='{$_GET[pw]}'"; 
  $result = @mysqli_fetch_array(mysqli_query($db,$query)); 
  if(($result['pw']) && ($result['pw'] == $_GET['pw'])) solve("darkknight"); 
  highlight_file(__FILE__); 
?>

<!-- NOTES: LÚC NÀY BÀI NÀY ĐÃ FILTER ', NHƯNG NÓ LẠI LẤY VÀO 2 GIÁ TRỊ TỪ USER LÀ pw và no 
ĐIỀU TA CẦN LÀM LÀ SỬA SAO CHO QUERY TỚI id = admin ==> dấu = bị filter ta có thể thay thế bằng LIKE 
VÌ VẬY TA CHỈ CẦN CHO ĐOẠN TỪ WHERE => no : false, sau đó sửa id = admin ==> nhưng nó đã filter ' ==> nên ta sẽ sử dụng hex ở đây để bypass:
PAYLOAD: ?pw=1&no=1 || id LIKE 0x61646D696E(admin) ==> lúc này câu truy vấn sẽ là select id from prob_darkknight where id LIKE 0x61646D696E -->

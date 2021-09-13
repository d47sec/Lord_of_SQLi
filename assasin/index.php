<?php 
  include "./config.php"; 
  login_chk(); 
  $db = dbconnect(); 
  if(preg_match('/\'/i', $_GET[pw])) exit("No Hack ~_~"); 
  $query = "select id from prob_assassin where pw like '{$_GET[pw]}'"; 
  echo "<hr>query : <strong>{$query}</strong><hr><br>"; 
  $result = @mysqli_fetch_array(mysqli_query($db,$query)); 
  if($result['id']) echo "<h2>Hello {$result[id]}</h2>"; 
  if($result['id'] == 'admin') solve("assassin"); 
  highlight_file(__FILE__); 
?>

<!-- NOTES: BÀI NÀY ĐÃ FILTER DẤU ' NHƯNG NÓ LẠI SÀI LIKE ĐỂ CHECK GIÁ TRỊ PW ==> NÊN TA CÓ THỂ SÀI REGEX Ở ĐÂY ĐỂ BRUTE  -->
<!-- NHƯNG CHÚ Ý LÀ guest được đặt vào table trước admin ==> nên ta cần brute guess trước vì khi regex đúng thì nó sẽ trả về của thằng guest  -->
<!-- khi đã tìm được thằng guest thì ta dò lại một lần để check thằng admin  -->
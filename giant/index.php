    
<?php 
  include "./config.php"; 
  login_chk(); 
  $db = dbconnect(); 
  if(strlen($_GET[shit])>1) exit("No Hack ~_~"); 
  if(preg_match('/ |\n|\r|\t/i', $_GET[shit])) exit("HeHe"); 
  $query = "select 1234 from{$_GET[shit]}prob_giant where 1"; 
  echo "<hr>query : <strong>{$query}</strong><hr><br>"; 
  $result = @mysqli_fetch_array(mysqli_query($db,$query)); 
  if($result[1234]) solve("giant"); 
  highlight_file(__FILE__); 
?>

<!-- NOTES: CHỈ CẦN BYPASS KHOẢNG TRỐNG ĐỂ CHO CÂU LỆNH CHẠY ĐƯỢC LÀ SẼ SOLVED ĐƯƠC, NHƯNG NÓ FILTER MỊA MẤY CÁI ĐỂ NGĂN CÁCH 2 CÁI CHUỖI NHƯ \r,\n\t,space ==> SEARCH TRONG BẢNG ASCII CÓ VÀI KÍ TỰ LẠ CÓ THỂ BỎ VÀO ĐỂ BYPASS CÁI NÀY NHƯ %0b, %0c -->
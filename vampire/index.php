<?php 
  include "./config.php"; 
  login_chk(); 
  $db = dbconnect(); 
  if(preg_match('/\'/i', $_GET[id])) exit("No Hack ~_~");
  $_GET[id] = strtolower($_GET[id]);
  $_GET[id] = str_replace("admin","",$_GET[id]); 
  $query = "select id from prob_vampire where id='{$_GET[id]}'"; 
  echo "<hr>query : <strong>{$query}</strong><hr><br>"; 
  $result = @mysqli_fetch_array(mysqli_query($db,$query)); 
  if($result['id'] == 'admin') solve("vampire"); 
  highlight_file(__FILE__); 
?>

<!-- Nó không filter giá trị của biến id lấy vào từ user mà chỉ sử dụng hàm str_replace(), thay thế từ admin có trong id của input user thành rỗng -->

<!-- payload: ?id=adadminmin ==> sau khi qua hàm str_replace ==> id=admin => solved  -->
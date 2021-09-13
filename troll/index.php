<?php  
  include "./config.php"; 
  login_chk(); 
  $db = dbconnect(); 
  if(preg_match('/\'/i', $_GET[id])) exit("No Hack ~_~");
//   Sài preg_match ('/admin/') nhưng nó ko đi kèm với modifier i ==> dẫn đến nó phân biệt hoa thường ==> bypass bằng cách viết hoa: ?id=aDmin 
// Trong sql thì nó lại ko phân biệt hoa thường 
  if(preg_match("/admin/", $_GET[id])) exit("HeHe");
  $query = "select id from prob_troll where id='{$_GET[id]}'";
  echo "<hr>query : <strong>{$query}</strong><hr><br>";
  $result = @mysqli_fetch_array(mysqli_query($db,$query));
  if($result['id'] == 'admin') solve("troll");
  highlight_file(__FILE__);
?>
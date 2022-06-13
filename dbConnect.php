<?php 
  //參數為(資料庫位置,username,password,Database name)
  $dbConnection = mysqli_connect('localhost','root','','php_gem');

  //檢查連線是否成功
  if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
  }

  //echo '成功了';

  //將文字編碼設為UTF-8以正確顯示中文
  mysqli_set_charset($dbConnection, 'utf8');
?>
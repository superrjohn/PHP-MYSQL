<?php include_once('header.php'); ?>

<h1>用戶登入</h1>

<form action="functions.php?op=checkLogin" method="post" id='login'>

  <label for="email">電郵:</label>
  <input type="email" id="email" name="email" require><br>
  
  <label for="email">密碼:</label>
  <input type="password" id="password" name="password">
  
  <br>
  <input type="submit" value="登入" class="btn btn-outline-primary">
  <br>
  <a href="register.php">還沒有帳號？現在就註冊吧！</a>
</form> 

<?php include_once('footer.php'); ?>
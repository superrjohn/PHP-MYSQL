<?php include_once 'header.php'; ?>

<h1>用戶註冊</h1>

<form class='register' action="functions.php?op=register" method="post">
  <div class="mb-3">
      <label for="TextInput" class="form-label">用戶稱呼</label>
      <input type="text" id="disabledTextInput" class="form-control" name='name'>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">電子郵件</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email'>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">郵件密碼</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name='password'>
    <div id="passwordHelpBlock" class="form-text">
    Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.</div>
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">服務條例</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include_once 'footer.php'; ?>
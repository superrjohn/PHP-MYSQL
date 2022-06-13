<?php 
include_once 'dbConnect.php';

$op ='none';
if(isset($_GET['op'])) $op = $_GET['op'];

if($op=='createOrder')
{
    createOrder();
}
if($op=='checkLogin')
{
    checkLogin($_POST['email'],$_POST['password']);
}
if($op=='logout')
{
    logout();
}
if($op == 'register'){
  register($_POST['name'],$_POST['email'],$_POST['password']);
}
if($op == 'delete'){
  delete($_GET['order']);
}

  //刪除
  function delete($id){
    global $dbConnection;

    $del = "DELETE FROM `php_gem`.`order` WHERE  `order_id`={$id}";
    mysqli_query($dbConnection,$del);
    function_alert('訂單已刪除囉~','allOrders.php');
    exit;
  }

  //註冊
  function register($name, $email, $password){
    global $dbConnection;

    $userQ = mysqli_query($dbConnection,"SELECT * FROM `user` WHERE `email`='".$email."'");
    //返回行數
    if(mysqli_num_rows($userQ) == 0 ){
      $sql = "INSERT INTO `php_gem`.`user` (
        `email`, 
        `password`,
         `name` 
         ) VALUES (
          '".$email."', 
         '".$password."',
         '".$name."')";
        
      if(mysqli_query($dbConnection,  $sql)){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $name;

        //密碼hash加密
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $updata = "UPDATE `php_gem`.`user` SET `password`='$hashedPassword' WHERE  `email`='".$email."'";
        mysqli_query($dbConnection, $updata);

        function_alert('註冊成功!','index.php');
        exit;
      }
      else{
        echo "Error creating table: " . mysqli_error($dbConnection);
      }
    }
    else{
      function_alert('該帳號已有人使用','register.php');
      exit;
  }

  }

  //alert跳轉功能
  function function_alert($message,$url) { 
      
    echo "<script>alert('$message');
     window.location.href='$url';
    </script>"; 

    return false;
} 

  function logout(){
    session_start();
    session_destroy();
    //destroy消毀
    header('Location: /');
  }
  //登入
  function checkLogin($email, $password){

    global $dbConnection;
    $userQ = mysqli_query($dbConnection, "SELECT * FROM `user` WHERE `email` = '".$email."'");
    //返回陣列
    $user = mysqli_fetch_assoc($userQ);

    //password_verify返回布林,查看hashed值跟密碼一樣不
    if(mysqli_num_rows($userQ) && $email == $user['email'] && password_verify($password, $user['password'])){

      //認證是一個user SESSION
      session_start();
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $user['name'];

      header("Location: /index.php");
    }
    else
    {
      function_alert('帳號密碼有誤','login.php');
    }
  }
  //下訂單
  function createOrder(){
    global $dbConnection;

    $gemQ = mysqli_query($dbConnection, "SELECT * FROM `gem` WHERE `gem_id`={$_POST['gem_id']}");
    $gem = mysqli_fetch_assoc($gemQ);  

    if($gem['remaining'] - $_POST['quantity'] >= 0){
    //儲存訂單
      $sql = "INSERT INTO `php_gem`.`order` (
      `user_name`, 
      `user_email`,
       `quantity`, 
       `order_time`, 
       `gem_id`
       ) VALUES (
       '{$_POST['name']}', 
       '{$_POST['email']}',
       {$_POST['quantity']}, 
       '".date('Y-m-d H:i:s')."',
       {$_POST['gem_id']})";
    //寫入mysql庫
    if(mysqli_query($dbConnection, $sql)){
      //你可以在這裡減去gem table的remaining存貨
      $update = "UPDATE `php_gem`.`gem` SET `remaining`={$gem['remaining']} - {$_POST['quantity']} WHERE `gem_id`={$_POST['gem_id']}";
      mysqli_query($dbConnection, $update);
      //轉變頁面
      header('Location:/order-completed.php');
    }
    else{
      //下單失敗
    }
   }
   else{
     function_alert('商品已沒有存貨,請預訂其他商品!','index.php');
   }
  }
  /*echo $_POST['gem_id']."<br>";
    echo $_POST['name']."<br>";
    echo $_POST['email']."<br>";
    echo $_POST['quantity']."<br>";
    echo date('Y-m-d H:i:s')."<br>";*/

    //儲存訂單 "a"在檔案後面加資料
   /* $myfile = fopen('data.csv',"a") or die("未能開啟檔案");
    $data = $_POST['gem_id'].','.$_POST['name'].','.$_POST['email'].','.$_POST['quantity'].','.date('Y-m-d H:i:s')."\r\n";
    fwrite($myfile, $data);
    fclose($myfile); */

    /* console.log功能
  function write_to_console($data) {
    $console = $data;
    if (is_array($console))
    $console = implode(',', $console);
   
    echo "<script>console.log('Console: " . $console . "' );</script>";
   }*/
?>

<?php include_once('header.php'); 
      include_once('functions.php'); 

?>
<h1>你的訂單</h1>
<h2>你的登入電郵是:<?php echo $_SESSION['email'];?></h2>

<script type="text/javascript" >
  let iid ;
  function del(id){
   iid = id;
    let btn = document.getElementById(id);
    btn.addEventListener('click',function(){
      
      let parent = btn.parentNode;
      let reprent = parent.parentNode;
      reprent.remove();
        //delete data  
    })
  }
</script>

<?php
//拿訪客的訂單資料
/* $orderData = file_get_contents('data.csv');
$orders = str_getcsv($orderData, "\r\n"); */

//用sql拿資料
$orderQ = mysqli_query($dbConnection, "SELECT * FROM `order` WHERE `user_email` = '{$_SESSION['email']}'");

if(mysqli_num_rows($orderQ) == 0 ){
  echo '<br><br><h1>沒有訂單喔~</h1>';
}

while ($order = mysqli_fetch_assoc($orderQ))
  {
    $gemQ = mysqli_query($dbConnection, "SELECT * FROM `gem` WHERE gem_id=".$order['gem_id']);
    $gem = mysqli_fetch_assoc($gemQ);  

    echo '<div class="Allorder" ><p>';
    echo '用戶稱呼 : '.$order['user_name'].'<br/>';
    echo '用戶電郵 : '.$order['user_email'].'<br/>';
    echo '想預訂 : '.$gem['name'].' X '.$order['quantity'].'件=$'.$gem['price']*$order['quantity'].' <br/>';
    echo '下單時間 : '.$order['order_time'].'<br/>';
    echo '
    <a href="/functions.php?op=delete&order='.$order['order_id'].'">
      <button type="button" class="btn btn-outline-secondary">刪除訂單</button>
    </a>';
    echo '</p></div>';
  };
  
?>
<?php include_once('footer.php'); ?>
<?php include_once 'header.php';?>

  <h1>寶石預訂</h1>
  <h2><?php echo date('n'); ?>月優惠</h2>

  <?php 
  echo '<div class="container">
        <div class="row goods">';

  $gemQ = mysqli_query($dbConnection, "SELECT * FROM `gem`");

  // 根據SELECT * FROM拿資料,一次拿一行array,當有資料while條件成為,便會執行內容
  while($gem = mysqli_fetch_assoc($gemQ)){
    echo '
    <div class="col-md">
      <img src="/images/'.$gem['image'].'"/>
      <p>
      名稱:'.$gem['name'].'<br>
      價格:$'.$gem['price'].'<br>
      <a href="/order.php?gem_id='.$gem['gem_id'].'"
      class="btn btn-outline-primary">預訂'.$gem['name'].'</a><br>
    </div>';
  }

  echo '</div>
        </div>';
  ?>

<?php include_once 'footer.php';?>



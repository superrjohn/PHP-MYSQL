<?php include_once 'header.php'; 
  //要登入後才能進
  if(!$_SESSION){
    header("Location: /login.php");
  }
?>

<form action="/functions.php?op=createOrder" method="post" class='order'>

  <label for="gem_name">預定產品名稱 </label>
  <input type="hidden" id="gem_id" name="gem_id" value="<?php echo $_GET['gem_id'];?>">
  <h2><?php echo $gems[$_GET['gem_id']-1]['name'];?></h2>

  <label for="name">你的稱呼:</label>
  <input type="text" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" readonly><br/>

  <label for="email">你的電郵:</label>
  <input type="email" id="email" name="email"  value="<?php echo $_SESSION['email']; ?>" readonly><br/>

  <label for="remaining">存貨數量:</label>
  <input type="number" id="remaining" name="remaining"  value="<?php echo $gems[$_GET['gem_id']-1]['remaining']; ?>" readonly><br/>

  <label for="quantity">購買數量:</label>
  <input type="number" id="quantity" name="quantity" min="1" max="5" value="1">
  
  <br>
  <input class="btn btn-outline-primary" type="submit" value="下單預定">
</form> 

<?php include_once 'footer.php';?>
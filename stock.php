<?php 
include_once 'dbConnect.php' ;

//改為從資料庫拿資料
$gemQ = mysqli_query($dbConnection, "SELECT * FROM `gem`");

$index = 0 ;
$gems = null ;

while($gem = mysqli_fetch_assoc($gemQ)){
  $gems[$index]['gem_id'] = $gem['gem_id'];
  $gems[$index]['name'] = $gem['name'];
  $gems[$index]['price'] = $gem['price'];
  $gems[$index]['image'] = $gem['image'];
  $gems[$index]['remaining'] = $gem['remaining'];

  $index ++;
};

/*$gems = 
[
  [
    'gem_id' => 1,
  'name' =>'白珍珠',
  'price' => 12,
  'image' => '1.jpg',
  'remaining' => 5
  ],
  [
    'gem_id' => 2,
  'name' => '紅心寶石',
  'price' => 100,
  'image' => '2.jpg',
  'remaining' => 5
  ],
  [
    'gem_id' => 3,
  'name' => '鑽石',
  'price' => 500,
  'image' => '3.jpg',
  'remaining' => 5
  ],
  [
  'gem_id' => 4,
  'name' => '綠寶石',
  'price' => 250,
  'image' => '4.jpg',
  'remaining' => 5
  ],
]; */

?>

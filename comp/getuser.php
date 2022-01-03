<?php

include_once '../comp/connect.php';
$output="";
$id = mysqli_real_escape_string($conn, $_POST['i']);
$sql2 = mysqli_query($conn, "SELECT * from users where random_id = '{$id}'");
$row = mysqli_fetch_assoc($sql2);
$cec= $row['este'];
    
$sql10 = mysqli_query($conn, "SELECT * from $cec WHERE random_id = '{$id}' ");

$row2 = mysqli_fetch_assoc($sql10);


$output.='<img src="../images/pht.jpg" alt="">
<p>
    '.$row['lname']." ".$row['fname'].'

</p>
<div class="tot">
  <div class="despre">
    <p>'.$row2['wut'].'</p>
    <p>'.$row2['description'].'</p>
  </div>
  <button type="button">
    Change
  </button>
</div>



';

  echo $output;

?>
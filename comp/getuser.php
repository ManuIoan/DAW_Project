<?php

include_once '../comp/connect.php';
$output="";
$id = mysqli_real_escape_string($conn, $_POST['i']);
$sql2 = mysqli_query($conn, "SELECT * from users where random_id = '{$id}'");
$row = mysqli_fetch_assoc($sql2);
$cec= $row['este'];
    
$sql10 = mysqli_query($conn, "SELECT * from $cec WHERE random_id = '{$id}' ");

$row2 = mysqli_fetch_assoc($sql10);


$output.='<img src="../images/'.$row['img'].'" alt="">
<p>
    '.ucfirst(strtolower($row['lname']))." ".ucfirst(strtolower($row['fname'])).'

</p>
<div class="tot">
  <div class="despre">
    <p>'.$row2['wut'].'</p>
    <p class="lm">'.ucfirst(strtolower($row2['description'])).'</p>
  </div>
  <input  type="submit" value="Schimba" name="submit22">
    

</div>
<div class="logout">
<form method="post">
  <input type="submit" name="submit2255" class="butl" value="Deconectare">
   

</form>
</div>



';

  echo $output;

?>
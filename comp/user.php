
<?php
require 'antet.php';
session_start();
 if($_SESSION["unique_id"]==null)
header("Location: register.php");

?>

<body class="sarc">
<?php
include_once 'connect.php';
$sql = mysqli_query($conn, "SELECT * from users WHERE random_id = '{$_SESSION["unique_id"]}' ");

$row = mysqli_fetch_assoc($sql);

if(isset($row['este']))
{
?>
<?php

$name= "u".$_SESSION["unique_id"];




$sql77=mysqli_query($conn,"SELECT distinct wd.id_wd, $name.done
FROM wd
LEFT JOIN $name
ON wd.id_wd=$name.id_job
WHERE wd.c_u =1");

$name2= $name."c";
$sql668=mysqli_query($conn,"CREATE TABLE $name2(id int(10) NOT NULL AUTO_INCREMENT, done int(10), id_job int(100),primary key (id) )");

while($row77 = mysqli_fetch_assoc($sql77))
{
 $sql100= mysqli_query($conn, "INSERT INTO $name2(done, id_job) VALUES('{$row77["done"]}', '{$row77["id_wd"]}' )");



}
$sqld=mysqli_query($conn, "DROP TABLE $name");
$sqld=mysqli_query($conn, "RENAME TABLE  $name2 to $name");


?>
<div class="ma">
<div class="chm">
    
    <button type="button" onclick="profile(<?php echo $_SESSION['unique_id'];  ?>)" class="pd1 profile">
        Profile
    </button>
    <button type="button" onclick="desc(<?php echo $_SESSION['unique_id'];  ?>, 0)" class="pd1 descopera">
        Descopera
    </button>
    <button type="button" onclick="chat(<?php echo $_SESSION['unique_id'];  ?>, 0)" class="pd1 descopera3">
        Chat
    </button>
    
    
</div>
<div class="scrrc">
    <img src="../images/pht.jpg" alt="">
    <p>
        Numele tau este:
 <?php
  echo $row['lname']." ".$row['fname'];
 
 ?>
    </p>
    <div class="tot">
       <div class="despre">
           <p>
        <?php
        $cec= $row['este'];
        
        $sql10 = mysqli_query($conn, "SELECT * from $cec WHERE random_id = '{$_SESSION["unique_id"]}' ");
       
        $row2 = mysqli_fetch_assoc($sql10);
        echo $row2['wut'];
        
        
        ?>
    </p>
    <p>
        <?php
         echo $row2['description'];
        ?>
    </p>
    </div>
    <form method="post">
  <input type="submit" name="submit22" value="Change"/>
    </form>
</div>
      

</div>
<?php

if(isset($_POST['submit22']))
{
    $sql5 = mysqli_query($conn,"UPDATE  users SET este = NULL WHERE random_id = '{$_SESSION["unique_id"]}'");
    $sql6 = mysqli_query($conn,"DELETE FROM  $cec  WHERE random_id = '{$_SESSION["unique_id"]}'");
if($sql5)
    {
        header("Refresh:0");
    }
    else
    printf("Connect failed: %s\n", mysqli_error($conn));
}

?>
<script src="../javascript/scriptpd.js"></script>


<?php
}
else
{
?>

<div class="container2">
    <form action="" class="f1"  method="post" enctype="multipart/form-data">

    <style>
  ::placeholder {
    font-size: 1.5rem;
  }
</style>
    
    <select name="chs" id="pet-select">
    <option value="">--Please choose an option--</option>
    <option value="wd">Web developer</option>
    <option value="md">Mobile developer</option>
    <option value="dd">Desktop developer</option>
   
</select>
    <textarea  name="dscr"  placeholder="Your description" class="tex2" required>
</textarea>
<button type="submit" class="tex" name="submit4">
               Submit
            </button>
    </form>
</div>
<?php
include_once "connect.php";
if(isset($_POST['submit4']))
{  
    




$chs = $_POST['chs'];
$dscr = $_POST['dscr'];
echo $dscr;
echo $chs;


$sql5 = mysqli_query($conn,"UPDATE  users SET este = '{$chs}' WHERE random_id = '{$_SESSION["unique_id"]}'");

if($sql5)
    {
        echo "Blana";
    }
    else
    printf("Connect failed: %s\n", mysqli_error($conn));

$name= "u".$_SESSION["unique_id"];
$sql66=mysqli_query($conn,"CREATE TABLE $name(id int(10) NOT NULL AUTO_INCREMENT, done int(10), id_job int(100),primary key (id) )");
if($sql66)
{
 echo "ceuau";
}
else
printf("Connect failed:yyyyyy %s\n", mysqli_error($conn));








$sql2 = mysqli_query($conn, "INSERT INTO $chs (random_id, description,c_u)
                VALUES ('{$_SESSION["unique_id"]}', '{$dscr}', 0)");
    if($sql2)
    {
        header("Location: user.php");
    }
    else
    printf("Connect failed: %s\n", mysqli_error($conn));



}
?>

<?php
}
?>
</body>

<?php
require 'sub.php';
?>
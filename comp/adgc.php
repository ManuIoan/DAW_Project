<?php
require 'antet.php';
session_start();
 if($_SESSION["unique_id"]==null)
header("Location: register.php");

?>

   <body class="sarc">

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


$sql5 =  mysqli_query($conn, "INSERT INTO domc (random_id, este)
VALUES ('{$_SESSION["unique_id"]}',  '{$chs}')");

if($sql5)
    {
        echo "Blana";
    }
    else
    printf("Connect failed: %s\n", mysqli_error($conn));

    


      $sql101 = mysqli_query($conn, "SELECT * from companii where random_id='{$_SESSION["unique_id"]}' ");
      if($sql101)
      {

      }
      else
      printf("Connect failed: %s\n", mysqli_error($conn));

      $row101= mysqli_fetch_assoc($sql101);
      $indi= $row101['indice']+1; 

      


      $sql90 = mysqli_query($conn,"UPDATE  companii SET indice='{$indi}' WHERE random_id = '{$_SESSION["unique_id"]}'");


    $name= $indi."c".$_SESSION["unique_id"];
    $sql66=mysqli_query($conn,"CREATE TABLE $name(id int(10) NOT NULL AUTO_INCREMENT, done int(10), id_job int(100),primary key (id) )");
    if($sql66)
    {
     echo "ceuau";
    }
    else
    printf("Connect failed:yyyyyy %s\n", mysqli_error($conn));




$sql2 = mysqli_query($conn, "INSERT INTO $chs (random_id, description, c_u, indice)
                VALUES ('{$_SESSION["unique_id"]}', '{$dscr}', 1,'{$indi}')");
    if($sql2)
    {
        header("Location:comp.php");
    }
    else
    printf("Connect failed: %s\n", mysqli_error($conn));



}
?>
   </body>


<?php
require 'sub.php';
?>
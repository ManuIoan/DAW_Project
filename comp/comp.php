<?php
require 'antet.php';
session_start();
 if($_SESSION["unique_id"]==null)
header("Location: register.php");

?>

<body class="sarc parc">
<div class="adaugare">
<div class="chm">
    
    <button type="button" onclick="profile(<?php echo $_SESSION['unique_id'];  ?>)" class="pd1 profile">
        Profiles
    </button>
    
    
</div>

<!-- <?php
include_once 'connect.php';




$sql101 = mysqli_query($conn, "SELECT * from companii where random_id='{$_SESSION["unique_id"]}' ");
      if($sql101)
      {

      }
      else
      printf("Connect failed: %s\n", mysqli_error($conn));

      $row101= mysqli_fetch_assoc($sql101);
      

if($row101['indice']!=0)
{
$inop=$row101['indice'];
while($inop!=0)
{

$name= $inop."c".$_SESSION["unique_id"];




$sql77=mysqli_query($conn,"SELECT distinct wd.id_wd, $name.done
FROM wd
LEFT JOIN $name
ON wd.id_wd=$name.id_job
WHERE wd.c_u =0");

$name2= $name."c";
$sql668=mysqli_query($conn,"CREATE TABLE $name2(id int(10) NOT NULL AUTO_INCREMENT, done int(10), id_job int(100),primary key (id) )");

while($row77 = mysqli_fetch_assoc($sql77))
{
 $sql100= mysqli_query($conn, "INSERT INTO $name2(done, id_job) VALUES('{$row77["done"]}', '{$row77["id_wd"]}' )");



}
$sqld=mysqli_query($conn, "DROP TABLE $name");
$sqld=mysqli_query($conn, "RENAME TABLE  $name2 to $name");
$inop--;
}
}



?> -->

    <div class="musk">
       <div class="adg">
        Adauga Job
       </div>
       <form method="post">
       <button type="submit" name="plus">
        +++++
       </button>
       </form>
       <?php
       include_once 'connect.php';
       $sql21 = mysqli_query($conn, "SELECT * from domc WHERE random_id = '{$_SESSION["unique_id"]}' ");
       if($sql21)
       {
        if($row21 = mysqli_fetch_assoc($sql21)){
            $cec2= $row21['este'];
            $sql31 = mysqli_query($conn, "SELECT * from $cec2 WHERE random_id = '{$_SESSION["unique_id"]}' ");
            if($sql31)
            {
                $output="";
                while($row31 = mysqli_fetch_assoc($sql31))
                $output.=
                 '<div class="despre">
                 <p>'.$row31['wut'].'</p>
                 <p>'.ucfirst(strtolower($row31['description'])).'</p>
               </div>
               <button type="button" name="submit22">
                 Change
               </button>
               <button type="button" onclick="desc('.$_SESSION['unique_id'].','.$row31['indice'].', 0)" class="pd1 descopera">
                 Descopera
               </button>
               ';
               echo $output;
            }
            else
            printf("Connect failed: %s\n", mysqli_error($conn));
        }

       }
       else
       printf("Connect failed: %s\n", mysqli_error($conn));
       
       ?>
    </div>


    <?php
    if(isset($_POST['plus']))
    {
        header("Location: adgc.php");

    }
    ?>

<div class="logout">
<form method="post">
  <input type="submit" name="submit2255" class="butl" value="Log Out">
   

</form>
</div>
    </div>
    <script src="../javascript/scriptpd2.js"></script>
</body>

<?php
if(isset($_POST['submit2255']))
{
    $_SESSION["unique_id"]= null;
    header("Location: login.php");
}
require 'sub.php';
?>
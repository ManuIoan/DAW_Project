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
        Profile
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

$sql21 = mysqli_query($conn, "SELECT * from domc WHERE random_id = '{$_SESSION['unique_id']}' AND  indice = '{$inop}' ");
$row21 = mysqli_fetch_assoc($sql21);
$este = $row21['este'];
if($este =="wd")
                {
                   $ids= "id_wd";
                   $co = 0;
                   }
                   else 
                   if($este=="md")
                   {
                   $ids= "id_md";
                   $co = 1;
                   }
                   else 
                   if($este=="dd")
                   {
                   $ids= "id_dd";
                   $co = 2;
                   }


$sql77=mysqli_query($conn,"SELECT distinct $este.$ids, $name.done
FROM $este
LEFT JOIN $name
ON $este.$ids=$name.id_job
WHERE $este.c_u =0");

$name2= $name."c";
$sql668=mysqli_query($conn,"CREATE TABLE $name2(id int(10) NOT NULL AUTO_INCREMENT, done int(10), id_job int(100),primary key (id) )");

while($row77 = mysqli_fetch_assoc($sql77))
{
 $sql100= mysqli_query($conn, "INSERT INTO $name2(done, id_job) VALUES('{$row77["done"]}', '{$row77[$ids]}' )");



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
        while($row21 = mysqli_fetch_assoc($sql21)){
            $cec2= $row21['este'];
            $sql31 = mysqli_query($conn, "SELECT * from $cec2 WHERE random_id = '{$_SESSION['unique_id']}' AND indice ='{$row21['indice']}'");
            if($sql31)
            {    

                if($cec2 =="wd")
                {
                   $ids= "id_wd";
                   $co = 0;
                   }
                   else 
                   if($cec2=="md")
                   {
                   $ids= "id_md";
                   $co = 1;
                   }
                   else 
                   if($cec2=="dd")
                   {
                   $ids= "id_dd";
                   $co = 2;
                   }
                $output="";
                if($row31 = mysqli_fetch_assoc($sql31))
                $output.=
                 '<div class="despre">
                 <p>'.$row31['wut'].'</p>
                 <p class="lm2">'.ucfirst(strtolower($row31['description'])).'</p>
               </div>
               <button type="button" name="submit22">
                 Schimba
               </button>
               <button type="button" onclick="desc('.$_SESSION['unique_id'].','.$row31['indice'].', 0,'.$co.')" class="pd1 descopera">
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
  <input type="submit" name="submit2255" class="butl" value="Deconectare">
   

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
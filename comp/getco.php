<?php
include_once "connect.php";
$id = mysqli_real_escape_string($conn, $_POST['i']);
$output2='<div class="chm">
    
<button type="button" onclick="profile('.$id.')" class="pd1 profile">
    Profiles
</button>


</div>';
$output2=$output2.'
<div class="musk">
<div class="adg">
        Adauga Job
       </div>
       <form method="post">
       <button type="submit" name="plus">
        +++++
       </button>
       </form>';
      
       include_once 'connect.php';
       $sql21 = mysqli_query($conn, "SELECT * from domc WHERE random_id = '{$id}' ");
       if($sql21)
       {
        while($row21 = mysqli_fetch_assoc($sql21)){
            $cec2= $row21['este'];
            $sql31 = mysqli_query($conn, "SELECT * from $cec2 WHERE random_id = '{$id}' ");
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
                if($row31 = mysqli_fetch_assoc($sql31))
                $output2.=
                 '<div class="despre">
                 <p>'.$row31['wut'].'</p>
                 <p class="lm2">'.ucfirst(strtolower($row31['description'])).'</p>
               </div>
               <button type="button" name="submit22">
                 Schimba
               </button>
               <button type="button" onclick="desc('.$id.','.$row31['indice'].', 0,'.$co.')" class="pd1 pd2 descopera">
                 Descopera
               </button>
               ';
               
            }
            else
            printf("Connect failed: %s\n", mysqli_error($conn));
        }

       }
       else
       printf("Connect failed: %s\n", mysqli_error($conn));
       $output2= $output2.'</div><div class="logout">
       <form method="post">
         <input type="submit" name="submit2255" class="butl" value="Deconectare">
          
       
       </form>
       </div>';
       echo $output2;
       ?>
    
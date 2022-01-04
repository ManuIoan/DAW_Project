<?php
include_once "connect.php";
$id = mysqli_real_escape_string($conn, $_POST['i']);
$output2='
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
               
                while($row31 = mysqli_fetch_assoc($sql31))
                $output2.=
                 '<div class="despre">
                 <p>'.$row31['wut'].'</p>
                 <p>'.$row31['description'].'</p>
               </div>
               <button type="button" name="submit22">
                 Change
               </button>
               ';
               
            }
            else
            printf("Connect failed: %s\n", mysqli_error($conn));
        }

       }
       else
       printf("Connect failed: %s\n", mysqli_error($conn));
       echo $output2;
       ?>
    
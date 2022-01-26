<?php
include_once '../comp/connect.php';
$output='<p class="bigger" >Chat with someone!</p>';

$id = mysqli_real_escape_string($conn, $_POST['i']);
$name = "u".$id."m";

$sql = mysqli_query($conn, "SELECT * from $name ");
if($sql)
while($row= mysqli_fetch_assoc($sql)){
    $sql2= mysqli_query($conn, "SELECT * from wd where id_wd='{$row['comp']}' ");
    if($sql2)
    {
        while($row2= mysqli_fetch_assoc($sql2))
        {
            $sql8000=mysqli_query($conn, "SELECT * FROM companii  where random_id='{$row2['random_id']}' ");
            
            $row800=mysqli_fetch_assoc($sql8000);
            
        $output .= '
        
        <div class="arta">
        <div class="rot">
        <img src="../images/'.$row800['img'].'" alt="" >
        </div>
        
        <div class="desc100">
        <a href="chat.php?user_id='.$row800['unique_id'].'"><p>'.ucfirst(strtolower($row800['num_comp'])).'</p></a>
        </div>
        </div>
        ';
        }
    }
    else printf("Connect failed: %s\n", mysqli_error($conn));

}


echo $output;


?>
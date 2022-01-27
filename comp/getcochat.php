<?php
include_once '../comp/connect.php';


$id = mysqli_real_escape_string($conn, $_POST['i']);
$c= mysqli_real_escape_string($conn, $_POST['c']);
$este= mysqli_real_escape_string($conn, $_POST['l']);

if($este==0)
$ico="wd";
else
if($este==1)
$ico="md";
else
$ico = "dd";
$ids= "id_".$ico;

$output ="".'<div class="chm">
    
<button type="button" onclick="profile('.$id.')" class="pd1 profile bro a1">
    Profiles
</button>
<button type="button" onclick="desc('.$id.','.$c.', 0,'.$este.')" class="pd1 profile a2">
    Descopera
</button>
<button type="button" onclick="chat('.$id.','.$c.')" class="pd1 descopera3 a3">
        Chat
    </button>

</div>';
$output=$output.'<p class="bigger" >Incepe o conversatie cu cineva!</p>';

$name = $c."c".$id."m";

$sql = mysqli_query($conn, "SELECT * from $name ");
if($sql)
while($row= mysqli_fetch_assoc($sql)){
    $sql2= mysqli_query($conn, "SELECT * from $ico where $ids='{$row['user']}' ");
    if($sql2)
    {
        if($row2= mysqli_fetch_assoc($sql2))
        {
            $sql800=mysqli_query($conn, "SELECT * from users  where random_id='{$row2['random_id']}' ");
            if($sql800)
            {}
            else printf("Connect failed: %s\n", mysqli_error($conn));
            $row800=mysqli_fetch_assoc($sql800);
        $output .= '
        <div class="arta">
        <div class="rot">
        <img  src="../images/'.$row800['img'].'" alt="" >
        </div>
        <div class="desc100">
        <a href="chat.php?user_id='.$row800['random_id'].'"><p>'.ucfirst(strtolower($row800['lname'])).' '.ucfirst(strtolower($row800['fname'])). '</p></a>
        </div>
        </div>
        ';
        }
    }
    else printf("Connect failed: %s\n", mysqli_error($conn));

}


echo $output;


?>
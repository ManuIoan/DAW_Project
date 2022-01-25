<?php
include_once '../comp/connect.php';
$output="<p>Chat with someone!<p>";

$id = mysqli_real_escape_string($conn, $_POST['i']);
$c= mysqli_real_escape_string($conn, $_POST['c']);
$name = $c."c".$id."m";

$sql = mysqli_query($conn, "SELECT * from $name ");
if($sql)
while($row= mysqli_fetch_assoc($sql)){
    $sql2= mysqli_query($conn, "SELECT * from wd where id_wd='{$row['user']}' ");
    if($sql2)
    {
        while($row2= mysqli_fetch_assoc($sql2))
        {
        $output .= '
        <div class="arta">
        <img src="../images/pht.jpg" alt="">
        <p>'.$row2['description'].'</p>
        </div>
        ';
        }
    }
    else printf("Connect failed: %s\n", mysqli_error($conn));

}


echo $output;


?>
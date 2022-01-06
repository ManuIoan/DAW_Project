<?php

include_once '../comp/connect.php';
$output="";

$id = mysqli_real_escape_string($conn, $_POST['i']);

$output ="".'<div class="chm">
    
<button type="button" onclick="profile('.$id.')" class="pd1 profile bro">
    Profiles
</button>
<button type="button" onclick="descopera('.$id.')" class="pd1 profile ">
    Descopera
</button>

</div>';


echo $output;


?>
<?php

include_once '../comp/connect.php';
$output="";

$id = mysqli_real_escape_string($conn, $_POST['i']);




$c = mysqli_real_escape_string($conn, $_POST['c']);
$r = mysqli_real_escape_string($conn, $_POST['r']);

$name = $c."c".$id;

$sql3 = mysqli_query($conn, "SELECT * from $name ");



$output ="".'<div class="chm">
    
<button type="button" onclick="profile('.$id.')" class="pd1 profile bro">
    Profiles
</button>
<button type="button" onclick="descopera('.$id.')" class="pd1 profile ">
    Descopera
</button>

</div>';


while($rowc=mysqli_fetch_assoc($sql3))
{
    if($rowc['done']==0)
    if($r!=0)
{
$sql55 = mysqli_query($conn, "UPDATE  $name SET done = $r WHERE id_job= '{$rowc['id_job']}' ");
if($sql55)
{}
else
printf("Connect failed: %s\n", mysqli_error($conn));
$r=0;
}
else
    {
    $sql10 = mysqli_query($conn, "SELECT * from wd WHERE id_wd = '{$rowc['id_job']}' ");
    $rowg = mysqli_fetch_assoc($sql10);
    $output.='<img src="../images/pht.jpg" alt="">

<div class="tot">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div class="despre">
<p>'.$rowg['wut'].'</p>
<p>'.$rowg['description'].'</p>
</div>

</div>
<div class="chm">

<button type="button" onclick="desc('.$id.','.$c.', -1)" class="profile2">

<span class="glyphicon glyphicon-thumbs-down"></span>
</button>
<button type="button" onclick="desc('.$id.','.$c.', 1)" class="descopera2">
<span class="glyphicon glyphicon-thumbs-up"></span>
</button>


</div>';
break;
    }

}
















echo $output;


?>
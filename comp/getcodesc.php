<?php

include_once '../comp/connect.php';
$output="";

$id = mysqli_real_escape_string($conn, $_POST['i']);




$c = mysqli_real_escape_string($conn, $_POST['c']);
$r = mysqli_real_escape_string($conn, $_POST['r']);

$name = $c."c".$id;

$sql3 = mysqli_query($conn, "SELECT * from $name ");



$sql294 = mysqli_query($conn, "SELECT * from wd where random_id = '{$id}' AND indice='{$c}'");
$row294 = mysqli_fetch_assoc($sql294);
$idwd = $row294['id_wd'];




$output ="".'<div class="chm">
    
<button type="button" onclick="profile('.$id.')" class="pd1 profile bro">
    Profiles
</button>
<button type="button" onclick="descopera('.$id.')" class="pd1 profile ">
    Descopera
</button>
<button type="button" onclick="chat('.$id.','.$c.')" class="pd1 descopera3">
        Chat
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
if($r==1)
{   
    $sql220 = mysqli_query($conn, "SELECT * FROM wd WHERE id_wd= '{$rowc['id_job']}'");
    $row220 = mysqli_fetch_assoc($sql220);
    $nameu  = 'u'.$row220['random_id'];
   



    $sql230 = mysqli_query($conn, "SELECT * FROM $nameu WHERE id_job= '{$idwd}'");
    
    if($sql230)
    {}
    else
    printf("Connect failed: %s\n", mysqli_error($conn));
    $row230 = mysqli_fetch_assoc($sql230);
    if(!isset($row230['done']))
    {echo "baraban";
        break;}
    else
    if( $row230['done']==1)
    {
        
      $output .= '<div class="tot"><p>It s a match &#10084; &#10084; &#10084; </p></div>';

      $name_mc= $name."m";
      $name_mu=$nameu."m";
      $sql1001= mysqli_query($conn, "SELECT * from $name_mu");
      if($sql1001)
      {
        $sql707 = mysqli_query($conn, "INSERT INTO $name_mu (comp)
        VALUES ('{$rowc['id_job']}' )");
      }
      else{
        $sql202 = mysqli_query($conn, "CREATE TABLE $name_mu(id int(10) NOT NULL AUTO_INCREMENT, comp int(100), primary key (id)) ");
        $sql707 = mysqli_query($conn, "INSERT INTO $name_mu (comp)
        VALUES ('{$rowc['id_job']}' )");
      }
       
      $sql1001= mysqli_query($conn, "SELECT * from $name_mc");
      if($sql1001)
      {  $sql707 = mysqli_query($conn, "INSERT INTO $name_mc (user)
        VALUES ('{$idwd}' )");}
      else{
        $sql202 = mysqli_query($conn, "CREATE TABLE $name_mc(id int(10) NOT NULL AUTO_INCREMENT, user int(100), primary key (id)) ");
        $sql707 = mysqli_query($conn, "INSERT INTO $name_mc (user)
        VALUES ('{$idwd}' )");
      }

 


      break;
    }



}



$r=0;
}
else
    {
    $sql10 = mysqli_query($conn, "SELECT * from wd WHERE id_wd = '{$rowc['id_job']}' ");
    $rowg = mysqli_fetch_assoc($sql10);
    $mus = $rowg['random_id'];
        $sql72= mysqli_query($conn, "SELECT * from users  WHERE random_id = '{$mus}'");
        $rowgu = mysqli_fetch_assoc($sql72);
    $output.='<div class="geogr"><img src="../images/'.$rowgu['img'].'" alt="" ></div>

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
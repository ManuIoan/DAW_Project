<?php

include_once '../comp/connect.php';
$output="";

$id = mysqli_real_escape_string($conn, $_POST['i']);
$r = mysqli_real_escape_string($conn, $_POST['r']);

$sql2 = mysqli_query($conn, "SELECT * from users where random_id = '{$id}'");
$row = mysqli_fetch_assoc($sql2);
$cec= $row['este'];


$sql294 = mysqli_query($conn, "SELECT * from wd where random_id = '{$id}'");
$row294 = mysqli_fetch_assoc($sql294);
$idwd = $row294['id_wd']; 



$name = "u".$id;
$sql3 = mysqli_query($conn, "SELECT * from $name ");

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
    $row220=mysqli_fetch_assoc($sql220);
    $nameu= "".$row220['indice'].'c'.$row220['random_id'];

    $sql230 = mysqli_query($conn, "SELECT * FROM $nameu WHERE id_job= '{$idwd}'");
    if($sql230)
    {}
    else
    printf("Connect failed: %s\n", mysqli_error($conn));
    $row230=mysqli_fetch_assoc($sql230);
    if(!isset($row230['done']))
    {}
    else
    if( $row230['done']==1)
    {
      $output .= '<div class="tot"><p>It s a match &#10084; &#10084; &#10084; </p></div>';

      $name_mc= $nameu."m";
      $name_mu=$name."m";
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
        $sql10 = mysqli_query($conn, "SELECT * from $cec WHERE id_wd = '{$rowc['id_job']}' ");
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
    
    <button type="button" onclick="desc('.$id.', -1)" class="profile2">
    
    <span class="glyphicon glyphicon-thumbs-down"></span>
    </button>
    <button type="button" onclick="desc('.$id.', 1)" class="descopera2">
    <span class="glyphicon glyphicon-thumbs-up"></span>
    </button>
    
    
</div>

';


break;
}


}








  echo $output;

?>
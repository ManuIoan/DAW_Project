<?php
session_start();
include_once "../comp/connect.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$user = mysqli_real_escape_string($conn, $_POST['un']);
$user2 = mysqli_real_escape_string($conn, $_POST['un2']);
$pass1 = mysqli_real_escape_string($conn, $_POST['pass1']);
$pass2 = mysqli_real_escape_string($conn, $_POST['pass2']);


    
 
   
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    if(empty($email) || empty($pass1)||  empty($pass2)|| empty($user)|| empty($user2))
    echo"Ai uitat ceva";
    else
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
echo "$email is not valid";
else
    if($pass1!= $pass2)
    echo "Parolele difera";
// else

// if(strlen($pass1)<8||strlen($pass1)>16)
// {
// echo $pass1;
// }
else
{
   $sql = mysqli_query($conn, "SELECT email from users WHERE email = '{$email}'");
   if(mysqli_num_rows($sql) > 0)
   {
       echo "$email already exist";
   }
   else
       {
           $random_id = rand(time(), 1000000);
           $new_img_name = $random_id.$img_name;
           move_uploaded_file($tmp_name, "../images/".$new_img_name);
           $sql2 = mysqli_query($conn, "INSERT INTO users (random_id, email, lname, fname, passwords, c_u, img)
           VALUES ('{$random_id}','{$email}','{$user}','{$user2}','{$pass1}','{$_SESSION["check"]}','{$new_img_name}')");
          if($sql2)
          {
           $_SESSION["unique_id"]=$random_id;
           $_SESSION["c_u"]=0;
          echo "succes";
          }
          else
          printf("Connect failed: %s\n", mysqli_error($conn));
       //    
          
       }
   }



// if(!empty($fname) && !empty($lname) && !empty($nota) && !empty($impressions))

?>
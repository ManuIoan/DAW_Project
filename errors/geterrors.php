<?php
session_start();
include_once "../comp/connect.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if(!empty($email) && !empty($password))
{

    $sql = mysqli_query($conn, "SELECT * from users WHERE email = '{$email}' AND passwords = '{$password}'");
     if(mysqli_num_rows($sql) > 0)
     {
     $row = mysqli_fetch_assoc($sql);
     $_SESSION['unique_id']=$row['random_id'];
     $_SESSION['c_u']=$row['c_u'];
     echo "succes";
     
     
     }
     else{
        $sql = mysqli_query($conn, "SELECT * from companii WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0)
     {
     $row = mysqli_fetch_assoc($sql);
     $_SESSION['unique_id']=$row['random_id'];
     $_SESSION['c_u']=$row['c_u'];
     echo "succes";
     }
     else echo "Parola sau email gresit";
    }
    



}
else
echo "All inputs field are required";

?>
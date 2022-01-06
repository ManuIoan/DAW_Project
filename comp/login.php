
<?php
require 'antet.php';
session_start();
if(isset($_SESSION["unique_id"]))
header("Location: main.php");
?>
<body class="sarc">
    <div class="container" >
        <img src="../images/log.jpg" alt="">
        <div class="login">
            <p>LOGIN your account</p>
            <form action="" class="f1" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="email" name="email" class="tex">
            <input type="password" placeholder="password" name="password" class="tex">
            <button type="submit" class="tex" name="submit3">
                Trimite
            </button>

            </form>
            <div class="reg">
            <h5>Nu ai cont?</h5>
            <a href="register.php">Inregistreaza-te</a>
            </div>

            </div>
        </div>
    </div>
</body>
<?php
include_once "connect.php";
 if(isset($_POST['submit3']))
 {
     $email = $_POST['email'];
     $pass = $_POST['password'];
     $sql = mysqli_query($conn, "SELECT * from users WHERE email = '{$email}' AND passwords = '{$pass}'");
     if(mysqli_num_rows($sql) > 0)
     {
     $row = mysqli_fetch_assoc($sql);
     $_SESSION['unique_id']=$row['random_id'];
     $_SESSION['c_u']=$row['c_u'];
     header("Location: main.php");
     }
     else{
        $sql = mysqli_query($conn, "SELECT * from companii WHERE email = '{$email}' AND password = '{$pass}'");
        if(mysqli_num_rows($sql) > 0)
     {
     $row = mysqli_fetch_assoc($sql);
     $_SESSION['unique_id']=$row['random_id'];
     $_SESSION['c_u']=$row['c_u'];
     header("Location: main.php");
     }
    }
 }
 else 
 echo "BAY";



?>
<?php
require 'sub.php';
?>
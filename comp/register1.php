
<?php
require 'antet.php';
session_start();
if(isset($_SESSION["unique_id"]))
header("Location: main.php");
 if($_SESSION["check"]==null)
header("Location: register.php");
?>
<body class="sarc">
    <div class="container" >
        
        <div class="login">
            <p>REGISTER your account</p>
            <form action="" class="f1" method="post" enctype="multipart/form-data">
            <input type="text" name="email"  placeholder="email" class="tex" required>
            <input type="text" name="un"     placeholder="lname" class="tex" required>
            <input type="text" name="un2"     placeholder="fname" class="tex" required>
            <input type="password" name="pass1"  placeholder="password" class="tex" required>
            <input type="password"  name="pass2" placeholder="password again" class="tex" required>
            <input type="file"  name="img"  required>

            

            <button type="submit" class="tex" name="submit2">
                Register
            </button>

            </form>
            <div class="reg">
            <h5>Ai cont?</h5>
            <a href="login.php">Conecteaza-te</a>
            </div>
            
            
        </div>
        <img src="../images/log.jpg" alt="">
    </div>
    <?php
    
    include_once "connect.php";
    

   
    if(isset($_POST['submit2']))
    {  
    $email = $_POST['email'];
    $user = $_POST['un'];
    $user2 = $_POST['un2'];
    $pass1 =  $_POST['pass1'];
    $pass2 =  $_POST['pass2'];
    $img_name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];

    $img_explode = explode('.', $img_name);
       $img_ext     = end($img_explode);
   
    
    if($pass1!= $pass2)
         echo "Parolele difera";
    else
    if($pass1<8&&$pass1>16)
    {
    echo "Parola este prea mica/mare";
    }
    else
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    echo "$email is not valid";
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
               header("Location: main.php");
               }
               else
               printf("Connect failed: %s\n", mysqli_error($conn));
            //    
               
            }
        }
    }
    
    else{
        // echo "Ai uitat sa scrii ceva";
    }
    // if(!empty($fname) && !empty($lname) && !empty($nota) && !empty($impressions))
    // }
    ?>


</body>
<?php
require 'sub.php';
?>

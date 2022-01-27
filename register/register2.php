
<?php
require '../comp/antet.php';
session_start();
if(isset($_SESSION["unique_id"]))
header("Location: ../comp/main.php");
 if($_SESSION["check"]==null)
header("Location: register.php");
?>
<body class="sarc">
    <div class="container" >
        
        <div class="login">
            <p>Inregistreaza-te</p>
            <form action="" class="f1" method="post" enctype="multipart/form-data">
            <input type="text" name="email"  placeholder="email" class="tex" required>
            <input type="text" name="un"     placeholder="numele companiei" class="tex" required>
            <input type="password" name="pass1"  placeholder="parola" class="tex" required>
            <input type="password"  name="pass2" placeholder="parola din nou" class="tex" required>
            
            <input type="file"class="tex mic"  name="img"  required>

            

            <button type="submit" class="tex" name="submit2" onclick="continueBtn()">
                Register
            </button>
            <div class="avert"> </div>
            </form>
            <div class="reg">
            <h5>Ai cont?</h5>
            <a href="../comp/login.php">Conecteaza-te</a>
            </div>
            
            
        </div>
        <img src="../images/log.jpg" alt="">
    </div>
    <?php
    
    include_once "../comp/connect.php";
    

   
    if(isset($_POST['submit2']))
    {  
    $email = $_POST['email'];
    $user = $_POST['un'];
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
    echo "$email is nopt valid";
    else
    {
        $sql = mysqli_query($conn, "SELECT email from companii WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0)
        {
            echo "$email already exist";
        }
        else{
            $sql = mysqli_query($conn, "SELECT num_comp from companii WHERE num_comp = '{$user}'");
            if(mysqli_num_rows($sql) > 0)
            {
                echo "$user already exist";
            } 
            else
            {
                $random_id = rand(time(), 1000000);
                $new_img_name = $random_id.$img_name;
                move_uploaded_file($tmp_name, "../images/".$new_img_name);
                $sql2 = mysqli_query($conn, "INSERT INTO companii (random_id, email, num_comp, password, c_u, img)
                VALUES ('{$random_id}','{$email}','{$user}','{$pass1}','{$_SESSION["check"]}', '{$new_img_name}')");
               if($sql2)
               {
                $_SESSION["unique_id"]=$random_id;
                $_SESSION["c_u"]=1;

               header("Location: ../comp/main.php");
               }
               else
               printf("Connect failed: %s\n", mysqli_error($conn));
            //    
               
            }
        }
    }
    }
    else{
        // echo "Ai uitat sa scrii ceva";
    }
    // if(!empty($fname) && !empty($lname) && !empty($nota) && !empty($impressions))
    // }
    ?>

<script src="../javascript/geterrors3.js"></script>
</body>
<?php
require '../comp/sub.php';
?>
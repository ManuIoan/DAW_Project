
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

            
           
            <button type="submit" class="tex" name="submit2" onclick="continueBtn()">
                Register
            </button>

            </form>
            <div class="avert"> </div>
            <div class="reg">
            <h5>Ai cont?</h5>
            <a href="login.php">Conecteaza-te</a>
            </div>
            
            
        </div>
        <img src="../images/log.jpg" alt="">
    </div>
    

<script src="../javascript/regis.js"></script>
</body>
<?php
require 'sub.php';
?>

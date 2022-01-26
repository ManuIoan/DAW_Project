
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
            <button type="submit" class="tex" name="submit3" onclick="continueBtn()">
                Trimite
            </button>
            <div class="avert"></div>

            </form>
            <div class="reg">
            <h5>Nu ai cont?</h5>
            <a href="../register/register.php">Inregistreaza-te</a>
            </div>

            </div>
        </div>
    </div>
</body>

<script src="../javascript/input.js"></script>
<?php
require 'sub.php';
?>
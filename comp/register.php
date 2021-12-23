
<?php
require 'antet.php';
require 'connect.php';
?>
<body>
    <div class="container" class="sketchy">
        
        <div class="login">
            <p>REGISTER your account</p>
            <form action="" class="f1">
            <input type="text" placeholder="email" class="tex" required>
            <input type="text" placeholder="username" class="tex" required>
            <input type="text" placeholder="password" class="tex" required>
            <input type="text" placeholder="password again" class="tex" required>

            <div class="choose">
            <div class="fp" >
                <input type="checkbox" name="check" onclick="onlyOne(this)">
                <label for="">Companie</label>
            </div>
            <div class="fp " >
                <input type="checkbox" name="check" onclick="onlyOne(this)">
                <label for="">User</label>
            </div>
            </div>

            <button type="submit" class="tex">
                Register
            </button>

            </form>
            <div class="reg">
            <h5>Nu ai cont?</h5>
            <a href="login.php">Conecteaza-te</a>
            </div>
            
            
        </div>
        <img src="../images/log.jpg" alt="">
    </div>
    <?php
    ?>


</body>
<?php
require 'sub.php';
?>

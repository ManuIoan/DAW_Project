<?php
require 'antet.php';
session_start();
 if($_SESSION["unique_id"]==null)
header("Location: register.php");

?>

<body class="sarc">
<div class="adaugare">
<div class="chm">
    
    <button type="button" onclick="profile(<?php echo $_SESSION['unique_id'];  ?>)" class="pd1 profile">
        Profiles
    </button>
    <button type="button" onclick="desc(<?php echo $_SESSION['unique_id'];  ?>)" class="pd1 descopera">
        Descopera
    </button>
    
</div>





    <div class="musk">
       <div class="adg">
        Adauga Job
       </div>
       <form method="post">
       <button type="submit" name="plus">
        +++++
       </button>
       </form>
       <?php
       include_once 'connect.php';
       $sql21 = mysqli_query($conn, "SELECT * from domc WHERE random_id = '{$_SESSION["unique_id"]}' ");
       if($sql21)
       {
        while($row21 = mysqli_fetch_assoc($sql21)){
            echo $row21['este'];
        }

       }
       else
       printf("Connect failed: %s\n", mysqli_error($conn));
       
       ?>
    </div>


    <?php
    if(isset($_POST['plus']))
    {
        header("Location: adgc.php");

    }
    ?>


    </div>
    <script src="../javascript/scriptpd2.js"></script>
</body>

<?php
require 'sub.php';
?>
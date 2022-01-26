<?php
require 'antet.php';
session_start();
 if($_SESSION["unique_id"]==null)
header("Location: ../register/register.php");
else{
    if($_SESSION["c_u"]==1)
        header("Location: comp.php");
    else
        header("Location: user.php");


}
?>

<?php
require 'sub.php';
?>
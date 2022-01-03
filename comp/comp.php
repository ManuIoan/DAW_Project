<?php
require 'antet.php';
session_start();
 if($_SESSION["unique_id"]==null)
header("Location: register.php");

?>

<body>
    
</body>

<?php
require 'sub.php';
?>
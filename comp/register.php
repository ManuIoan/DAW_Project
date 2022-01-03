<?php
session_start();
include_once "antet.php";
if(isset($_SESSION["unique_id"]))
header("Location: main.php");
?>
<body class="sarc">
<div class="container2" >
   <form action="" method="post">
     <label for="">  
  Sunteti un angajator sau un angajat?
     </label>
     <div class="choose">
            <div class="fp" >
                <input type="checkbox" id="check" name="check" onclick="onlyOne(this)" value="1">
                <label for="">Companie</label>
            </div>
            <div class="fp " >
                <input type="checkbox" id="check" name="check" onclick="onlyOne(this)" value="0">
                <label for="">User</label>
            </div>
            </div>

            <button type="submit" class="tex" name="submit2">
                Register
            </button>

            
   </form>
</div>
</body>
<?php
include_once "sub.php";

if(isset($_POST['submit2'])&& isset($_POST['check']))
{
    $check = $_POST['check'];
    $_SESSION["check"] = $check;
    if($check=="0")
    header("Location: register1.php");
    else
    header("Location: register2.php");
}
?>
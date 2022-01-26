<?php
   session_start();
   
   if(!isset($_SESSION['unique_id']))
   {
       
      header("location: main.php");


   }
?>







<?php
include_once "antet.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real time chat app</title>
     <link rel="stylesheet" href="../css/stylechat.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    
    <div class="wrapper">
       <section class="chat-area">
          <header>
          <?php
             include_once "connect.php";
             $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
             $sql =mysqli_query($conn, "SELECT * FROM users WHERE random_id = '{$user_id}'");
             $sql2 =mysqli_query($conn, "SELECT * FROM companii WHERE random_id = '{$user_id}'");
             if(mysqli_num_rows($sql) > 0)
             {
                 $row = mysqli_fetch_assoc($sql);
             }
             else
             $row = mysqli_fetch_assoc($sql2);
             
             ?>


              
              <a href="main.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
              <img src="../images/<?php echo $row['img'];?>" alt="">
              <div class="details">
                  <span><?php if(isset($row['fname']))
                  {
                  echo  ucfirst(strtolower($row['fname'])). " ". ucfirst(strtolower($row['lname'])); 
                    $ok = 1;
                  }
                  else
                  {echo ucfirst(strtolower($row['num_comp']));
                    $ok=0;
                  }
                  ?></span>
                  
              </div>
          </header>
         <div class="chat-box">
            
         </div>

         <form action="#" method="post" class="typing-area" autocomplete="off">
             <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
             <input type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
             <input type="text" name="user" value="<?php echo $ok ?>" hidden>
             <input type="text" name="message" class="input-field" placeholder="Type a message here...">
             
             <button><i class="fab fa-telegram-plane"></i></button>
         </form>
       </section>




    </div>

<script src="../javascript/chat3.js"></script> 

</body>
</html>
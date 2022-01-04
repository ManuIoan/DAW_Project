let prof = document.querySelector('.profile');
let dsc = document.querySelector('.descopera');
let scr = document.querySelector('.musk');

 
 
 
 const profile = (str) =>{
    prof.style.backgroundColor="#fff";
    dsc.style.backgroundColor="antiquewhite";
  

    let xhr = new XMLHttpRequest();
      //creating XML object
      xhr.open("POST", "getco.php", true);
      xhr.onload = ()=>{
         if(xhr.readyState === XMLHttpRequest.DONE)
         {
             if(xhr.status === 200){
                 let data = xhr.response;
                 scr.innerHTML = data;
                 
                 
                 
             }
         }
      }
  
   console.log(str);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("i="+str);

      }
  






//     scr.innerHTML=`<img src="../images/pht.jpg" alt="">
//     <p>
//         Numele tau este:
//  <?php
//   echo $row['lname']." ".$row['fname'];
 
//  ?>
//     </p>
//     <p>Cauti de lucru in :
//         <?php
//         $cec= $row['este'];
        
//         $sql10 = mysqli_query($conn, "SELECT * from $cec WHERE random_id = '{$_SESSION["unique_id"]}' ");
       
//         $row2 = mysqli_fetch_assoc($sql10);
//         echo $row2['wut'];
        
        
//         ?>
//     </p>
//     <p>Descrierea ta este: 
//         <?php
//          echo $row2['description'];
//         ?>
//     </p>

      

// </div>`
 


 const desc = () =>{
    dsc.style.backgroundColor="#fff";
    prof.style.backgroundColor="antiquewhite";
    scr.innerHTML= ``;
}

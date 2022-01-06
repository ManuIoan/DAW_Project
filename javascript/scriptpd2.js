let prof = document.querySelector('.profile');
let dsc = document.querySelector('.descopera');
let scr = document.querySelector('.musk');
let chm = document.querySelector('.adaugare');

 
 
 
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
                 chm.innerHTML = data;
                 
                 
                 
             }
         }
      }
  
   console.log(str);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("i="+str);

      }
  


 


 const desc = (str) =>{
    dsc.style.backgroundColor="#fff";
    prof.style.backgroundColor="antiquewhite";
   


    let xhr = new XMLHttpRequest();
    //creating XML object
    xhr.open("POST", "getcodesc.php", true);
    xhr.onload = ()=>{
       if(xhr.readyState === XMLHttpRequest.DONE)
       {
           if(xhr.status === 200){
               let data = xhr.response;
               chm.innerHTML = data;
               
               
               
           }
       }
    }

 console.log(str);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("i="+str);

    }











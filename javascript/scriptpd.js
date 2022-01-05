let prof = document.querySelector('.profile');
let dsc = document.querySelector('.descopera');
let scr = document.querySelector('.scrrc');
let desc44 = document.querySelector('bi-suit-heart-fil');


 
 
 
 const profile = (str) =>{
    prof.style.backgroundColor="#fff";
    dsc.style.backgroundColor="antiquewhite";
  

      let xhr = new XMLHttpRequest();
      //creating XML object
      xhr.open("POST", "getuser.php", true);
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


 const desc = (str, r) =>{
    dsc.style.backgroundColor="#fff";
    prof.style.backgroundColor="antiquewhite";
    scr.innerHTML= ``;



    let xhr = new XMLHttpRequest();
      //creating XML object
      xhr.open("POST", "getdesc.php", true);
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
      xhr.send("i="+str+"&"+"r="+r);
}

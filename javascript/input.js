console.log("Hello");
let err = document.querySelector('.avert');
const form = document.querySelector(".container form");


form.onsubmit = (e) =>{
    e.preventDefault(); // preventing form from submiting
}

const continueBtn = ()=>{
    


    let xhr = new XMLHttpRequest();
    //creating XML object
    xhr.open("POST", "../errors/geterrors.php", true);
    xhr.onload = ()=>{
       if(xhr.readyState === XMLHttpRequest.DONE)
       {
           if(xhr.status === 200){
               
               let data = xhr.response;
               if(data=="succes")
               {   
                   window.location.reload();}
               else
               err.innerHTML = data;
               
               
               
           }
       }
    }


    let formData = new FormData(form);

    xhr.send(formData);


}
const form=document.querySelector(".row form"),
continuebtn=form.querySelector(".row form button"),
error=form.querySelector(".row form .error-message");
form.onsubmit=(e)=>{
    e.preventDefault();
}
continuebtn.onclick=()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php-savedata/login-save.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
               let data=xhr.response;
               if(data=="success"){
                location.href="users.php";
               }
               else{
                   error.textContent=data;
                   error.style.display="block";
               }
           }
        }
    }
    //sending data through ajax
    let formdata= new FormData(form);//creating object of formsdata
    xhr.send(formdata);
}
const passwordfeild=document.querySelector('.form  input[type="password"]'),
togglebtn=document.querySelector(".form .feild .i");
togglebtn.onclick=()=> {
   if(passwordfeild.type=="password"){
       passwordfeild.type="text";
       togglebtn.style.color="black";
       togglebtn.className = 'fa fa-eye-slash';
   }
   else{
       passwordfeild.type="password";
       togglebtn.style.color="";
       togglebtn.className = 'fa fa-eye';

   }
}

const form=document.querySelector(".typing-box"),
inputfeild=form.querySelector(".text"),
textbtn=form.querySelector(".button"),
chatbox=document.querySelector(".card .chat-body");

form.onsubmit=(e)=>{
    e.preventDefault();
}
textbtn.onclick=()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php-savedata/save-chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
               inputfeild.value="";//after sending text inputfeild should be empty
               scrollToButtom();
           }
        }
    }
    //sending data through ajax
    let formdata= new FormData(form);//creating object of formsdata
    xhr.send(formdata);
}
chatbox.onmouseenter=()=>{
    chatbox.classList.add("active");
}

chatbox.onmouseleave=()=>{
    chatbox.classList.remove("active");
}

//this function will run after 500ms 
setInterval(()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php-savedata/get_chat.php",true);
    xhr.onload=()=>{
        if(xhr.readyState===XMLHttpRequest.DONE){
           if(xhr.status===200){
                let data=xhr.response;
                console.log(data); //if user is not searching other user to chat
                chatbox.innerHTML=data; 
               if(!chatbox.classList.contains("active")){
                scrollToButtom();
               }
            }
        }
    }
    
    //sending data through ajax
    let formdata= new FormData(form);//creating object of formsdata
    xhr.send(formdata);
},500);
function scrollToButtom() {
    chatbox.scrollTop=chatbox.scrollHeight;
}

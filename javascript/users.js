const searchbar=document.querySelector(".user  .search input"),
searchbtn=document.querySelector(".user .search .button"),
userlist=document.querySelector(".chat-body .user-list");

searchbtn.onclick=()=> {
        searchbar.classList.toggle("active");
        searchbar.focus();
        searchbtn.classList.toggle("active");
        searchbar.value="";
        //searchbtn.className="fa fa-times";
        
}
searchbar.onkeyup=()=>{
    let searchTerm= searchbar.value;
    if(searchbar!=""){
        searchbar.classList.add("active");
    }
    else{
        searchbar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
        xhr.open("POST","php-savedata/search.php",true);
        xhr.onload=()=>{
            if(xhr.readyState===XMLHttpRequest.DONE){
               if(xhr.status===200){
                   let data=xhr.response;
                   console.log(data);
                  userlist.innerHTML=data; 
                }
            }
        }
        xhr.setRequestHeader("content-type","application/x-www-form-urlencoded")
       xhr.send("searchTerm=" + searchTerm);
}
//search bar


//this function will run after 500ms 
setInterval(()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("GET","php-savedata/usersave.php",true);
        xhr.onload=()=>{
            if(xhr.readyState===XMLHttpRequest.DONE){
               if(xhr.status===200){
                   let data=xhr.response;
                   console.log(data);
                   if(!searchbar.classList.contains("active")){ //if user is not searching other user to chat
                       userlist.innerHTML=data; 
                   }
                }
            }
        }
        
       xhr.send();
},500);
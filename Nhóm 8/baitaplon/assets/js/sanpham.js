const userBtn = document.querySelector(".user-btn");
const dropdown = document.querySelector(".dropdown-menu");

userBtn.addEventListener("click", function(e){
    e.stopPropagation();

    if(dropdown.style.display === "block"){
        dropdown.style.display = "none";
    }else{
        dropdown.style.display = "block";
    }
});

document.addEventListener("click", function(){
    dropdown.style.display = "none";
});
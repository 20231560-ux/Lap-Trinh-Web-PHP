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

const adminIcon = document.getElementById("adminSetting");
const adminMenu = document.getElementById("adminMenu");

if (adminIcon && adminMenu) {
    adminIcon.addEventListener("mouseenter", function () {
        adminMenu.style.display = "block";
    });

    adminIcon.addEventListener("mouseleave", function () {
        adminMenu.style.display = "none";
    });
}
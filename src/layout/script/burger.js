const Nav = document.querySelector("nav");
const Menu = document.querySelector(".Nav_Menu");
const IconBurg = document.querySelector(".BurgerIcon");
// const IconClose = document.querySelector(".CloseIcon");
let flag = 0;

IconBurg.addEventListener("click", () => {
    if(flag == 0) {
        Nav.classList.add("ouvert");
        flag = 1;
    } else {
        Nav.classList.remove("ouvert");
        flag = 0;
    }
    
})
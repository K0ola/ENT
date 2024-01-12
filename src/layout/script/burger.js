const Nav = document.querySelector("nav");
const Menu = document.querySelector(".Nav_Menu");
const IconBurgC = document.querySelector(".BurgerIconC");
const IconBurgO = document.querySelector(".BurgerIconO");
// const IconClose = document.querySelector(".CloseIcon");

IconBurgC.addEventListener("click", () => {
        Nav.classList.add("ouvert");
        IconBurgC.style.display = "none";
        IconBurgO.style.display = "block";  
})

IconBurgO.addEventListener("click", ()=> {
    Nav.classList.remove("ouvert");
    IconBurgO.style.display = "none";
    IconBurgC.style.display = "block";
})
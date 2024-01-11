
const boxes = document.querySelectorAll(".themeBox");

function check(id) {

    for (let i = 0; i < boxes.length; i++) {
        boxes[i].checked = false;
    }

    document.querySelector("#"+id).checked = true;
}

function loadCheck(){

    let info = localStorage.getItem("ENT_theme");
    console.log(info);

    let nameTheme = info;

    check(nameTheme);
    
}

loadCheck()

for(i=0; i< boxes.length; i++){
    let box = boxes[i];

    // on écoute le clic sur ces liens
    box.addEventListener('click' , () => {
        check(box.id);
        changeTheme(box.id);
    })
}
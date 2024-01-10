const theme = ["Tropical-Blue", "Pippin", "Beryl-Green", "Amour", "Derby", "Silver-Rust", "Lucky-Point"];
const body = document.querySelector("body");
// const boxes = document.querySelectorAll(".themeBox");

function changeTheme(name) {
    // let info = localStorage.getItem("theme");
    console.log(name);

    let ListeClass = body.classList;
    let remo = "";

    for (let i = 0; i < ListeClass.length; i++) {

        console.log("class");

        for (let y = 0; y < theme.length; y++) {

            console.log("theme");


            if (ListeClass[i] == theme[y]) {
                remo = ListeClass[i];
                console.log(remo);
                body.classList.remove(remo);
            }

        }
    }

    body.classList.add(name);
    localStorage.setItem("ENT_theme", name);
}

function check(id) {

    for (let i = 0; i < boxes.length; i++) {
        boxes[i].checked = false;
    }

    document.querySelector("#"+id).checked = true;
}

function loadTheme(){

    let info = localStorage.getItem("ENT_theme");
    console.log(info);

    let nameTheme = "";

    if (info == null) {

        let ListeClass = body.classList;

        for (let i = 0; i < ListeClass.length; i++) {

            for (let y = 0; y < theme.length; y++) {

                if (ListeClass[i] == theme[y]) {
                    nameTheme = ListeClass[i];
                }

            }
        }
    } else {
        nameTheme = info;
    }

    // check(nameTheme);
    changeTheme(nameTheme);
}

loadTheme()

// for(i=0; i< boxes.length; i++){
//     let box = boxes[i];

//     // on écoute le clic sur ces liens
//     box.addEventListener('click' , () => {
//         check(box.id);
//         changeTheme(box.id);
//     })
// }

// localStorage.setItem("ENT_theme", "sombre");
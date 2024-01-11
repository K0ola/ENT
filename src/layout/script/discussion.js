let box = document.querySelector("#discussion-box");
let flag = 0;

document.querySelector("#top-disc").addEventListener("click", openDiscussion);

function openDiscussion(){

    if(flag == 0){

        console.log('coucou');
        box.classList.add("openDiscus");
        flag = 1;

    } else {

        console.log('Bye');
        box.classList.remove("openDiscus");
        flag = 0;

    }

}
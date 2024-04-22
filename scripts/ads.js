function CollapseUncollapseForm(Userinformations, Form){

    const userInformations = document.getElementById(Userinformations);
    if (userInformations.classList.contains("MyUncollapse")) {
        document.getElementById(Userinformations).classList.replace("MyUncollapse", "MyCollapse");
        document.getElementById(Form).classList.replace("MyCollapse", "MyUncollapse");
    }else{
        document.getElementById(Userinformations).classList.replace("MyCollapse", "MyUncollapse");
        document.getElementById(Form).classList.replace("MyUncollapse", "MyCollapse");
    }
}
function RepeatText(input,place)
{
    const inputt = document.getElementsByName(input)[0];
    const placee = document.getElementsByName(place)[0];
    placee.innerHTML = inputt.value;
}
function changeImage(image, check, save) {
    const imageCheck = document.getElementById(image);
    console.log(imageCheck.src);
    console.log(check);
    console.log(save);
    switch (imageCheck.src) {
        case check:
            imageCheck.src = save;
            break;
        case save:
            imageCheck.src = check;
            break;
    }
}
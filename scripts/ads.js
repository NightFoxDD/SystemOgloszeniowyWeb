const images = [
    '<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />',
    ' <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />',
    '<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />',
    '<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />',
    ' <path d="M0 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z" />',
    '<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" /><path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />',
    '<path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />'
]
const ROOT_IMG = "http://localhost/SystemOgloszeniowyWeb/images/assets/";
var color = "dodgerblue";
var defaultColor = "#0099E6";
ChangeTmpImageColor();
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
    switch (imageCheck.src) {
        case check:
            imageCheck.src = save;
            break;
        case save:
            imageCheck.src = check;
            break;
    }
}
function adsssd(){
    var Div = document.createElement('div');
    var type = document.getElementById('Subject_BasicInfromations').value;
    Div.className = 'col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start';
    const content = document.getElementsByName("TBIinput")[0];
    const description = document.getElementsByName("TBIdescInput")[0];
    // Tworzenie zawartości zegara
    var clockContent = `
        <div class="float-start rounded-2 d-flex justify-content-center align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="${color}" class="bi bi-clock-fill" viewBox="0 0 16 16">
                ` + images[type] + `
            </svg>
        </div>
        <div class="p-4">
            <h2 class="fs-4">
                <p id = "PositionName_1">${content.value}</p>
            </h2>
            <p class="fs-6 text-gray">${description.value}</p>
        </div>
    `;
    Div.innerHTML = clockContent;
    document.getElementById('BasicInformations').appendChild(Div);
    document.getElementById('Subject_BasicInfromations').value = 0;
    document.getElementsByClassName("TBIinput").value = "";
    document.getElementsByClassName("TBIdescInput").value = "";
    RepeatText('TBIdescContent','TBIdescInput');
    document.getElementById("TMP_Color").value = defaultColor;
    ChangeTmpImageColor();
    ChangeTmpImage();
    if(document.getElementById("changeposition_image_TBIdesc").src == `${ROOT_IMG}/checked.png`){
        CollapseUncollapseForm('containerDescInput','containerDescContent');
        changeImage('changeposition_image_TBIdesc',`${ROOT_IMG}/checked.png`,`${ROOT_IMG}/edit.png`);
    }
    if(document.getElementById("changeposition_image_TBI").src == `${ROOT_IMG}/checked.png`){
        CollapseUncollapseForm('containerInput','containerContent');
        changeImage('changeposition_image_TBI',`${ROOT_IMG}/checked.png`,`${ROOT_IMG}/edit.png`);
    }

    
};
function ChangeTmpImage(){
    const container = document.getElementById('tmp_image');
    
    var type = document.getElementById('Subject_BasicInfromations').value;
    container.innerHTML="";

    var newSVG = ` <svg xmlns="http://www.w3.org/2000/svg"  width="70" height="70" fill="${color}" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                ${images[type]}
                </svg>`;

    container.innerHTML = newSVG;
}
function ChangeTmpImageColor(){
    color = document.getElementById("TMP_Color").value;
    ChangeTmpImage();
}
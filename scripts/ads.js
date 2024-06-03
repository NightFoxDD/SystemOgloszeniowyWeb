const images = [
    '<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />',
    ' <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />',
    '<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />',
    '<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />',
    ' <path d="M0 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z" />',
    '<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" /><path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />',
    '<path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />'
];

const inputTypes = [ "Text","Date"];
const ROOT_IMG = "http://localhost/SystemOgloszeniowyWeb/images/assets/";
const usedInformations = [];
const useInformations=[0,1,2,3,4,5,6];
const duties = [];
const requirements = [];
const welcome = [];
const benefits = [];
const descriptions = [];
const subCategoriesFromJson = JSON.parse(subcategoriesArray);
const CategoriesFromJson = JSON.parse(categoriesArray);
showSubCategories();
showCheckedCategories();
refreshDutiesArray();
refreshRequirementsArray();
refreshBenefitArray();
refreshDescriptionArray();
refreshWelcomeArray();

var color = "dodgerblue";
var defaultColor = "#0099E6";

updateSelectOptions();
//BASIC FUNCTIONS
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

//BASIC INFORMAITONS FUNCTIONS


function addBasicInformations(){
    var Div = document.createElement('div');
    var type = document.getElementById('Subject_BasicInfromations').value;
    usedInformations.push(type);

    if(color == undefined){
        color = "dodgerblue";     
        document.getElementById("TMP_Color").selected = color;
    }
    updateSelectOptions();
    Div.className = 'col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start';
    const content = document.getElementsByName("TBIinput")[0];
    const description = document.getElementsByName("TBIdescInput")[0];
    var clockContent = `
    <div class="float-start rounded-2 d-flex justify-content-center align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="${color}" class="bi bi-clock-fill" viewBox="0 0 16 16">
            ${images[type]}
        </svg>
    </div>
    <div class="p-4">
        <h2 class="fs-4">
            <p id="PositionName_1">${content.value}</p>
            <input type='text' name='InputTitle_${type}' value='${content.value}_${color}'>
        </h2>
        <p class="fs-6 text-gray">
            ${description.value}
            <input type='text' value='${description.value}' name='InputDescription_${type}'>
        </p>
    </div>
    <button onclick="removeElement(this.parentNode)">Remove</button>
`;
    Div.innerHTML = clockContent;
    document.getElementById('BasicInformations').appendChild(Div);
    document.getElementById('Subject_BasicInfromations').value = 0;
    document.getElementsByClassName("TBIinput").value = "";
    document.getElementsByClassName("TBIdescInput").value = "";
    RepeatText('TBIdescContent','TBIdescInput');
    ChangeTmpImage();
    if(document.getElementById("changeposition_image_TBIdesc").src == `${ROOT_IMG}/checked.png`){
        CollapseUncollapseForm('containerDescInput','containerDescContent');
        changeImage('changeposition_image_TBIdesc',`${ROOT_IMG}/checked.png`,`${ROOT_IMG}/edit.png`);
    }
    if(document.getElementById("changeposition_image_TBI").src == `${ROOT_IMG}/checked.png`){
        CollapseUncollapseForm('containerInput','containerContent');
        changeImage('changeposition_image_TBI',`${ROOT_IMG}/checked.png`,`${ROOT_IMG}/edit.png`);
    }
}
function updateSelectOptions() {
    var selectElement = document.getElementById('Subject_BasicInfromations');
    selectElement.innerHTML = '';
    
    createElementSelect(selectElement, '0', 'lokalizacja');
    createElementSelect(selectElement, '1', 'Czas oczekiwania na pracę');
    createElementSelect(selectElement, '2', 'Typ umowy');
    createElementSelect(selectElement, '3', 'Termin');
    createElementSelect(selectElement, '4', 'Stanowisko');
    createElementSelect(selectElement, '5', 'Rodzaj pracy (zdalna/stacjonarna/hybrydowa)');
    createElementSelect(selectElement, '6', 'Typ zatrudnienia');
}
function removeElement(element) {

    var removedType = element.querySelector('input[name^="InputTitle_"]').name.split('_')[1];
    element.parentNode.removeChild(element);
    var index = usedInformations.indexOf(removedType);
    if (index !== -1) {
        usedInformations.splice(index, 1);
    }
    
    updateSelectOptions();
    ChangeTmpImage();
}
function createElementSelect(SelectID,value, text){
    if(usedInformations.includes(value))
        {
            return;
        }
    
    var defaultOption = document.createElement('option');
    defaultOption.value = value;
    defaultOption.text = text;
    SelectID.appendChild(defaultOption);
    
}
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

//MAP FUNCTIONS
function addMapPoint(){
    const mapPointSrc = document.getElementsByName("inputMapPoint")[0].value.split(" ");
    document.getElementsByName("inputMapPoint")[0].value = "";
    var Div = document.getElementById('Container_AddMapPoint');
    var mappoint= mapPointSrc[1].slice(5);
    mappoint = mappoint.slice(0,-1);
    console.log(mappoint);
    document.getElementById("inputMapPoint2").value = mappoint;
    var iframeMapPoint = `
        <iframe src=" ${mappoint}" width="100%" height="350 rem" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    `;
    Div.innerHTML = iframeMapPoint;
    document.getElementById('addMapPoint').style.visibility = "hidden";
    document.getElementById('deleteMapPoint').style.visibility = "visible";
}
function removeMapPoint(){
    var Div = document.getElementById('Container_AddMapPoint');
    document.getElementById("inputMapPoint2").value = "";
    Div.innerHTML = "";
    document.getElementById('addMapPoint').style.visibility = "visible";
    document.getElementById('deleteMapPoint').style.visibility = "hidden";
}

//DUTIES
function showDuties(){
    console.log(duties);
    const container = document.getElementById('containerDuties');
    var body = "";
    container.innerHTML="";
    document.getElementsByName('InputDuties')[0].value = "";
    duties.forEach(dutie => {
        document.getElementsByName('InputDuties')[0].value += dutie + ";";
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>`;
        body += `<li class="list-group-item border-0"> ${svg} ${dutie}<button type='button' onclick = 'deleteDutie(${duties.indexOf(dutie)})'>remove</button></li>`;
    });

    container.innerHTML = body;
}
function addDutes(){
    var value = document.getElementsByName('inputDutie')[0].value;
    duties.push(value);
    document.getElementsByName('inputDutie')[0].value = "";
    showDuties();
}
function deleteDutie(element){
    duties.splice(element, 1);
    showDuties();
}
//EDIT DUTIES

function refreshDutiesArray(){
    console.log(dutiesArray);
    document.getElementsByName('InputDuties')[0].value = "";
    dutiesArray1.forEach((benefit) => {
        document.getElementsByName('InputDuties')[0].value += benefit + ";";
    });
}
function showEditDuties() {
    const container = document.getElementById('containerDuties');
    var body = "";
    container.innerHTML = "";
    dutiesArray1.forEach((dutie, index) => {
       
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>`;
        body += `
            <li class="list-group-item border-0">
               ${svg}
                    <div id="containerContentDuties_${index}" class="MyUncollapse">
                        <h2 class="fs-4" name="divDuties_${index}">
                            ${dutie}
                        </h2>
                    </div>
                    <div id="containerInputDuties_${index}" class="MyCollapse">
                        <input type="text" name="inputDuties1_${index}" value="${dutie}" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                    </div>
                 
                        <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateText('inputDuties1_${index}',${index}),RepeatText('inputDuties1_${index}','divDuties_${index}'),CollapseUncollapseForm('containerInputDuties_${index}','containerContentDuties_${index}'),changeImage('changeposition_image_TBI_Duties_${index}','${ROOT_IMG}/checked.png','${ROOT_IMG}/edit.png')"><img id="changeposition_image_TBI_Duties_${index}" src="${ROOT_IMG}/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                    <button type='button' onclick = 'deleteEditDutie(${index})'>remove</button>
            </li>
        `
    });
    document.getElementsByName('InputDuties')[0].value = "";
    dutiesArray1.forEach((benefit) => {
        document.getElementsByName('InputDuties')[0].value += benefit + ";";
    });

    container.innerHTML = body;
}
function UpdateText(inputid,index){
    var newValue = document.getElementsByName(inputid)[0].value;
     dutiesArray1[index] = newValue;
    refreshDutiesArray();
}
function addEditDutes() {
    var value = document.getElementsByName('inputDutie')[0].value;
    dutiesArray1.push(value);
    document.getElementsByName('inputDutie')[0].value = "";
    showEditDuties();
}

function deleteEditDutie(element) {
    dutiesArray.splice(element, 1);
    showEditDuties();
}

//REQUIREMENTS
function showRequirements(){
    console.log(requirements);
    const container = document.getElementById('containerRequirements');
    var body = "";
    container.innerHTML="";
    document.getElementsByName('InputRequirements')[0].value = "";
    requirements.forEach(requirement => {
        document.getElementsByName('InputRequirements')[0].value += requirement + ";";
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>`;
        body += `<li class="list-group-item border-0"> ${svg} ${requirement} <button type='button' onclick = 'deleteRequirement(${requirements.indexOf(requirement)})'>remove</button></li>`;
    });
    container.innerHTML = body;
}
function addRequirements(){
    var value = document.getElementsByName('Textarea_requirements')[0].value;
    requirements.push(value);
    document.getElementsByName('Textarea_requirements')[0].value = "";
    showRequirements();
}
function deleteRequirement(element){
    requirements.splice(element, 1);
    showRequirements();
}
//EDIT REQUIREMENTS
function refreshRequirementsArray(){
    console.log(requirementsArray);
    document.getElementsByName('InputRequirements')[0].value = "";
    requirementsArray.forEach((dutie) => {
        document.getElementsByName('InputRequirements')[0].value += dutie + ";";
    });
}
function showEditRequirements() {
    const container = document.getElementById('containerRequirements');
    var body = "";
    container.innerHTML = "";
    document.getElementsByName('InputRequirements')[0].value = "";

    requirementsArray.forEach((requirement, index) => {
        document.getElementsByName('InputRequirements')[0].value += requirement + ";";
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>`;
        body += `
            <li class="list-group-item border-0">
               ${svg}
                    <div id="containerContentRequi_${index}" class="MyUncollapse">
                        <h2 class="fs-4" name="divRequi_${index}">
                            ${requirement}
                        </h2>
                    </div>
                    <div id="containerInputRequi_${index}" class="MyCollapse">
                        <input type="text" name="inputRequi1_${index}" value="${requirement}" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                    </div>
                 
                        <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateRequirementText('inputRequi1_${index}',${index}),RepeatText('inputRequi1_${index}','divRequi_${index}'),CollapseUncollapseForm('containerInputRequi_${index}','containerContentRequi_${index}'),changeImage('changeposition_image_TBI_Requi_${index}','${ROOT_IMG}/checked.png','${ROOT_IMG}/edit.png')"><img id="changeposition_image_TBI_Requi_${index}" src="${ROOT_IMG}/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                    <button type='button' onclick = 'daleteEditRequirement(${index})'>remove</button>
            </li>
        `
    });
    container.innerHTML = body;
}
function UpdateRequirementText(inputid,index){
    var newValue = document.getElementsByName(inputid)[0].value;
    requirementsArray[index] = newValue;
    refreshRequirementsArray();
}
function addEditRequirements() {
    var value = document.getElementsByName('Textarea_requirements')[0].value;
    requirementsArray.push(value);
    document.getElementsByName('Textarea_requirements')[0].value = "";
    showEditRequirements();
}

function daleteEditRequirement(element) {
    requirementsArray.splice(element, 1);
    showEditRequirements();
}

//WELCOME
function showWelcome(){
    console.log(welcome);
    const container = document.getElementById('containerWelcome');
    var body = "";
    container.innerHTML="";
    welcome.forEach(welcomeItem => {
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>`;
        body += `<li class="list-group-item border-0"> ${svg} ${welcomeItem} <button type='button' onclick = 'deleteWelcome(${welcome.indexOf(welcomeItem)})'>remove</button></li>`;
    });
    document.getElementsByName('InputWelcome')[0].value = "";
    welcome.forEach(element => {
        document.getElementsByName('InputWelcome')[0].value += element + ";";
    });
    container.innerHTML = body;
}
function addWelcome(){
    var value = document.getElementsByName('Textarea_welcome')[0].value;
    welcome.push(value);
    document.getElementsByName('Textarea_welcome')[0].value = "";
    showWelcome();
}
function deleteWelcome(element){
    welcome.splice(element, 1);
    showWelcome();
}
//EDIT WELCOME
function refreshWelcomeArray(){    
    console.log(welcomeArray);
    document.getElementsByName('InputWelcome')[0].value = "";
    welcomeArray.forEach((dutie) => {
        document.getElementsByName('InputWelcome')[0].value += dutie + ";";
    });
}
function showEditWelcome() {
    const container = document.getElementById('containerWelcome');
    var body = "";
    container.innerHTML = "";
    document.getElementsByName('InputWelcome')[0].value = "";

    welcomeArray.forEach((item, index) => {
        document.getElementsByName('InputWelcome')[0].value += item + ";";
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>`;
        body += `
            <li class="list-group-item border-0">
               ${svg}
                    <div id="containerContentDuties_${index}" class="MyUncollapse">
                        <h2 class="fs-4" name="divDuties_${index}">
                            ${item}
                        </h2>
                    </div>
                    <div id="containerInputDuties_${index}" class="MyCollapse">
                        <input type="text" name="inputDuties1_${index}" value="${item}" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                    </div>
                 
                        <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateWelcomeText('inputDuties1_${index}',${index}),RepeatText('inputDuties1_${index}','divDuties_${index}'),CollapseUncollapseForm('containerInputDuties_${index}','containerContentDuties_${index}'),changeImage('changeposition_image_TBI_Duties_${index}','${ROOT_IMG}/checked.png','${ROOT_IMG}/edit.png')"><img id="changeposition_image_TBI_Duties_${index}" src="${ROOT_IMG}/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                    <button type='button' onclick = 'deleteEditWelcome(${index})'>remove</button>
            </li>
        `
    });

    container.innerHTML = body;
}
function UpdateWelcomeText(inputid,index){
    var newValue = document.getElementsByName(inputid)[0].value;
     welcomeArray[index] = newValue;
     refreshWelcomeArray();
}
function addEditWelcome() {
    var value = document.getElementsByName('Textarea_welcome')[0].value;
    welcomeArray.push(value);
    document.getElementsByName('Textarea_welcome')[0].value = "";
    showEditWelcome();
}

function deleteEditWelcome(element) {
    welcomeArray.splice(element, 1);
    showEditWelcome();
}

//BENEFITS
function showBenefits(){
    const container = document.getElementById('ContainerBenefits');
    var body = "";
    container.innerHTML="";
    benefits.forEach(benefit => {
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
        <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
        </svg>`;
        body += `<div class="col-lg-3 col-md-6 col-sm-12 p-1">
                    <div class="rounded-3 shadow-sm border m-3 p-3">
                        <div class="d-flex justify-content-center align-items-center">
                            ${svg}
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="text-center">${benefit}</p>
                        </div>
                        <button type='button' onclick = 'deleteBenefit(${benefits.indexOf(benefit)})'>remove</button>
                    </div>
                </div> `;
    });
    document.getElementsByName('InputBenefits')[0].value = "";
    benefits.forEach(element => {
        document.getElementsByName('InputBenefits')[0].value += element + ";";
    });
    container.innerHTML = body;
}
function addBenefit(){
    var value = document.getElementsByName('InputBenefit')[0].value;
    benefits.push(value);
    document.getElementsByName('InputBenefit')[0].value = "";
    showBenefits();
    
}
function deleteBenefit(element){
    benefits.splice(element, 1);
    showBenefits();
}
//EDIT BENEFITS 

function refreshBenefitArray() {
    console.log(benefitArray);
    document.getElementsByName('InputBenefits')[0].value = "";
    benefitArray.forEach((benefit) => {
        document.getElementsByName('InputBenefits')[0].value += benefit + ";";
    });
}

function showEditBenefit() {
    const container = document.getElementById('ContainerBenefits');
    var body = "";
    container.innerHTML = "";
    document.getElementsByName('InputBenefits')[0].value = "";

    benefitArray.forEach((benefit, index) => {
        document.getElementsByName('InputBenefits')[0].value += benefit + ";";
        var svg = `<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
        <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
        </svg>`;
        body += `
            <div class="col-lg-3 col-md-6 col-sm-12 p-1">
                <div class="rounded-3 shadow-sm border m-3 p-3">
                    <div class="d-flex justify-content-center align-items-center">
                        ${svg}
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div id="containerContentBenefits1_${index}" class="MyUncollapse">
                            <h2 class="fs-4" name="divBenefits1_${index}">
                                ${benefit}
                            </h2>
                        </div>
                        <div id="containerInputBenefits1_${index}" class="MyCollapse">
                            <input type="text" name="inputBenefits1_${index}" value="${benefit}" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                        </div>
                        <button type="button" class="btn btn-outline-secondary m-1" onclick="UpdateBenefitText('inputBenefits1_${index}', ${index}); RepeatText('inputBenefits1_${index}', 'divBenefits1_${index}'); CollapseUncollapseForm('containerInputBenefits1_${index}', 'containerContentBenefits1_${index}'); changeImage('changeposition_image_TBI_Benefits1_${index}', '${ROOT_IMG}/checked.png', '${ROOT_IMG}/edit.png')">
                            <img id="changeposition_image_TBI_Benefits1_${index}" src="${ROOT_IMG}/edit.png" class="image-thumbnail" style="height:50px; weight:50px;">
                        </button>
                    </div>
                    <button type='button' onclick='deleteEditBenefit(${index})'>remove</button>
                </div>
            </div>
        `;
    });

    container.innerHTML = body;
}

function UpdateBenefitText(inputid, index) {
    var newValue = document.getElementsByName(inputid)[0].value;
    benefitArray[index] = newValue;
    refreshBenefitArray();
    showEditBenefit();  // Odświeżenie widoku po aktualizacji
}

function addEditBenefit() {
    var value = document.getElementsByName('InputBenefit')[0].value;
    benefitArray.push(value);
    document.getElementsByName('InputBenefit')[0].value = "";
    showEditBenefit();
}

function deleteEditBenefit(index) {
    benefitArray.splice(index, 1);
    showEditBenefit();
}

//DESCRIPTIONS
function showDescriptions(){
    console.log(descriptions);
    const container = document.getElementById('ContainerDescription');
    var body = "";
    container.innerHTML="";
    descriptions.forEach(descriptionItem => {
        
        body += ` <div class="col-12 mt-5 border rounded-3 shadow-sm p-4">
                    ${descriptionItem}
                        <button type='button' onclick = 'deleteDescription(${descriptions.indexOf(descriptionItem)})'>remove</button>
                </div> `;
    });
    document.getElementsByName('InputDescriptions')[0].value = "";
    descriptions.forEach(element => {
        document.getElementsByName('InputDescriptions')[0].value += element + ";";
    });
    container.innerHTML = body;
}
function addDescription(){
    var value = document.getElementsByName('TextAreaDescription')[0].value;
    descriptions.push(value);
    document.getElementsByName('TextAreaDescription')[0].value = "";
    showDescriptions();

}
function deleteDescription(element){
    descriptions.splice(element, 1);
    showDescriptions();
}
//EDIT DESCRIPTIONS
function refreshDescriptionArray(){
    console.log(descriptionArray);
    document.getElementsByName('InputDescriptions')[0].value = "";
    descriptionArray.forEach((dutie) => {
        document.getElementsByName('InputDescriptions')[0].value += dutie + ";";
    });
}
function showEditDescripton() {
    const container = document.getElementById('ContainerDescription');
    var body = "";
    container.innerHTML = "";
    document.getElementsByName('InputDescriptions')[0].value = "";

    descriptionArray.forEach((dutie, index) => {
        document.getElementsByName('InputDescriptions')[0].value += dutie + ";";
       
        body += `
                <div id="containerContentDescrip_${index}" class="MyUncollapse col-12 mt-5 border rounded-3 shadow-sm p-4">
                    <h2 class="fs-4" name="divDescrip_${index}">
                        ${dutie}
                    </h2>
                </div>
                <div id="containerInputDescrip_${index}" class="MyCollapse col-12 mt-5 border rounded-3 shadow-sm p-4">
                    <textarea type="text" name="inputDescrip1_${index}" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0">${dutie}</textarea>
                </div>
                
                    <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateDescriptionText('inputDescrip1_${index}',${index}),RepeatText('inputDescrip1_${index}','divDescrip_${index}'),CollapseUncollapseForm('containerInputDescrip_${index}','containerContentDescrip_${index}'),changeImage('changeposition_image_TBI_Descrip_${index}','${ROOT_IMG}/checked.png','${ROOT_IMG}/edit.png')"><img id="changeposition_image_TBI_Descrip_${index}" src="${ROOT_IMG}/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                <button type='button' onclick = 'deleteEditDescription(${index})'>remove</button>
        `
    });

    container.innerHTML = body;
}
function UpdateDescriptionText(inputid,index){
    var newValue = document.getElementsByName(inputid)[0].value;
    descriptionArray[index] = newValue;
    refreshDescriptionArray();
}
function addEditDescriptions() {
    var value = document.getElementsByName('TextAreaDescription')[0].value;
    descriptionArray.push(value);
    document.getElementsByName('TextAreaDescription')[0].value = "";
    showEditDescripton();
}

function deleteEditDescription(element) {
    descriptionArray.splice(element, 1);
    showEditDescripton();
}

function ChangeTmpEditImageColor($image){
    const container = document.getElementById('divImage_' + $image);
    container.innerHTML = 
    `
    <svg xmlns="http://www.w3.org/2000/svg" id = "image_`+ $image +`" width="70" height="70" fill="`+ document.getElementById('TMP_Edit_Color_'+$image).value + `" class="bi bi-clock-fill" viewBox="0 0 16 16">
       `+ images[$image] + `
    </svg>
    `;
}

function check(){
    console.log(categoriesArray);console.log(subcategoriesArray);
}

function showSubCategories() {
    const container = document.getElementById("subcategoryContainer");
    const masterId = document.getElementById("selectCategory").value;
    let body = "";
    subCategoriesFromJson.forEach((subcategory, index) => {
        if (masterId == subcategory['master_id']) {
            body += `<li><input type='checkbox' id="checkbox_${index}" ${subcategory['checked'] === true ? 'checked' : ''} onchange='updateCheckbox(${index},${subcategory['master_id']})'> ${subcategory['name']} </li>`;
        }
    });
    container.innerHTML = body;
}

function updateCheckbox(index,masterid) {
    const checkbox = document.getElementById(`checkbox_${index}`);
    subCategoriesFromJson[index]['checked'] = checkbox.checked;
    CategoriesFromJson.forEach((category,index)=>{
        if(category['id'] == masterid){
            let count = 0;
            subCategoriesFromJson.forEach((subcategory,index)=>{
                if(subcategory['master_id'] == masterid){
                    if(subCategoriesFromJson[index]['checked'] == true){
                        count++;
                    }
                }
            })
            if(count > 0){
                CategoriesFromJson[index]['checked'] = true;
            }else{
                CategoriesFromJson[index]['checked'] = false;
            }
        }
    })
    showCheckedCategories();
}
function showCheckedCategories() {
    const container = document.getElementById("checkedCategoryContainer");
    const inputCat = document.getElementById("savedCategories");
    const inputSubCat = document.getElementById("savedSubCategories");
    inputCat.value = "";
    inputSubCat.value = "";
    let body = "";
    CategoriesFromJson.forEach(category => {
        if(category['checked']){
            console.log(category['id'] + ";");
            inputCat.value += category['id'] + ";";
            body+= `<li> ${category['name']} <ul>`;
            subCategoriesFromJson.forEach(subcategory => {
                if (subcategory['master_id'] === category['id'] && subcategory['checked']) {
                    body += `<li>${subcategory.name}</li>`;
                    inputSubCat.value += category['id'] + "_" + subcategory['id'] + ";";
                }
            });
            body+="</ul></li>";
        }
        
    });
    container.innerHTML = body; 
}
<form method = "POST" action = "<?php echo ROOT_URL?>ads/add">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col p-3 card shadow-sm">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                <div class="d-flex justify-content-start align-items-top">
                    <img src="<?php echo ROOT_IMG ?>/Swiftlly_transparent_Logo.png" height="128" alt="Zdjęcie profilowe firmy">
            
                    <?php echo $model['add_PositionName'];?>
                </div>
                </li>
                <li class="list-group-item">
                    <div class="container">
                    <div class="row">
                        <div class="col justify-content-center align-items-center" >
                            <input type="color" id="TMP_Color" value="#0099E6" onchange="ChangeTmpImageColor()">
                            <select id="Subject_BasicInfromations" onchange="ChangeTmpImage()" onload="ChangeTmpImage()">
                                <option value="0">lokalizacja</option>
                                <option value="2">Typ umowy</option>
                                <option value="4">Stanowisko</option>
                                <option value="1">Czas oczekiwania na pracę</option>
                                <option value="3">Termin</option>
                                <option value="5">Rodzaj pracy (zdalna/stacjonarna/hybrydowa)</option>
                                <option value="6">Typ zatrudnienia</option>
                            </select>   
                                <div class="float-start rounded-2 d-flex justify-content-center align-items-center" id = "tmp_image">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="dodgerblue" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                    </svg>
                                </div>
                                <div class="p-4">
                                    <div class="col">
                                        <div id="containerContent" class="MyUncollapse">
                                            <h2 class="fs-4" name="TBIcontent">Default title </h2>
                                        </div>
                                        <div id="containerInput" class="MyCollapse">
                                            <h2><input type="text" name="TBIinput" value="Default title" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/><h2>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button id="btn_changeTBI" type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('TBIinput','TBIcontent'),CollapseUncollapseForm('containerInput','containerContent'),changeImage('changeposition_image_TBI','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
                                    </div>
                                    <div class="col">
                                        <div id="containerDescContent" class="MyUncollapse">
                                            <p class="fs-6 text-gray" name="TBIdescContent">Default description</p>
                                        </div>
                                        <div id="containerDescInput" class="MyCollapse">
                                            <input type="text" name="TBIdescInput" value="Default description" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button id="btn_changeTBI" type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('TBIdescInput','TBIdescContent'),CollapseUncollapseForm('containerDescInput','containerDescContent'),changeImage('changeposition_image_TBIdesc','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBIdesc" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
                                    </div>
                                    
                                </div>
                            <button type="button" onclick="addBasicInformations()" class="button" id="AddBasicInformaiton">Add</button>
                        </div>
                    </div>
                    <div class="row" id="BasicInformations">
                    </div>
                    
                </div>
                </li>
            </ul>
            </div>
        </div>
        <div class="row">
            <div id = "addMapPoint">
                <input type="text" name = "inputMapPoint">
                <button type="button" onclick="addMapPoint()">ADD</button>
            </div>
            <div id = "deleteMapPoint" style="visibility:hidden;">
                <button type="button" onclick="removeMapPoint()">remove</button>
            </div>
            <div class="col-12 mt-5" id = "Container_AddMapPoint">
            
            </div>
        </div>
        <div class="row">
            <div class="col mt-5 rounded-3 shadow-sm border p-3">
            <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <textarea name = "inputDutie"></textarea>
            </li>
            <button type="button" onclick="addDutes()">Dodaj obowiazek</button>
            <input type="text" name="InputDuties">
            <h1 class="fs-3">Twój zakres obowiązków</h1>
            <ul class="list-group list-group-flush" id="containerDuties">
            
            </ul>
            </div>
        </div>
        <div class="row">
            <div class="col mt-5 rounded-3 shadow-sm border p-3">
            <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <textarea name = "Textarea_requirements"></textarea>
                <button type="button" onclick="addRequirements()">dodaj</button>
                <input type="text" name="InputRequirements">
            </li>
            <h1 class="fs-3">Nasze wymagania</h1>
            <ul class="list-group list-group-flush" id = "containerRequirements">
            
            </ul>
            <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <textarea name = "Textarea_welcome"></textarea>
                <button type="button" onclick="addWelcome()">dodaj</button>
                <input type="text" name="InputWelcome">
            </li>
            <h1 class="fs-3">Mile widziane</h1>
            <ul class="list-group list-group-flush" id = "containerWelcome">
                
            </ul>
            </div>
        </div>
        <div class="row">
            <div class="col mt-5 rounded-3 shadow-sm border p-3">
            <div class="col-lg-3 col-md-6 col-sm-12 p-1">
                <div class="rounded-3 shadow-sm border m-3 p-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                        <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                        </svg>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <p class="text-center"><input type="text" name="InputBenefit"></p>
                    </div>
                    <button type="button" onclick="addBenefit()">dodaj benefit</button>
                    <input type="text" name = "InputBenefits"> 
                </div>
            </div>
            <h2 class="fs-4">Benefity</h2>
            <div class="container" >
                <div class="row d-flex justify-content-start" id = "ContainerBenefits">
            
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5 border rounded-3 shadow-sm p-4">
            <textarea name="TextAreaDescription"></textarea>
            <button type="button" onclick="addDescription()">Add</button>
            <input name="InputDescriptions">
            </div>
            <div id = "ContainerDescription"></div>
        </div>
        <div class="row">
            <div class="col mt-5 border rounded-3 p-3">
            <h1 class="fs-3">Dowiedz się więcej o Pracodawcy:</h1>
            <a href="" class="text-decoration-none">
                Zobacz profil pracodawcy
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                </svg>
            </a>
            </div>
        </div>
        <div class="row">
            <button type="submit" name='add'>Dodaj </button>
        </div>
    </div>
</form>
<form method = "POST" action = "<?php echo ROOT_URL?>ads/edit">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col p-3 card shadow-sm">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                <div class="d-flex justify-content-start align-items-top">
                    <?php echo $model['CompanyImage'];?>
            
                    <?php echo $model['add_PositionName'];?>
                    
                </div>
                </li>
                <li class="list-group-item">
                    <div class="container">
                    
                    <div class="row" id="BasicInformations">
                        <?php 
                            foreach($model['BasicInformations'] as $content){
                                echo $content;
                            }
                        ?>
                    </div>
                    
                </div>
                </li>
            </ul>
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col p-3 card shadow-sm">
                <input type="hidden" name="SavedSubCategories" id="savedSubCategories">
                <input type="hidden" name="SavedCategories" id="savedCategories">
                <select id="selectCategory" required onchange="showSubCategories()">
                    <?php 
                        foreach($model['Categories'] as $category){
                            echo "<option value='". $category['id'] ."'>". $category['name'] ."</option>";
                        }
                    ?>
                </select>
                <script> console.log(subcategoriesArray);</script>
                <ul id="subcategoryContainer">

                </ul>
                <ul id="checkedCategoryContainer">

                </ul>
            </div>
        </div>
        <div class="row">
            <input type="hidden" required id="inputMapPoint2" name="inputMapPoint2" value="<?php echo $model['MapSrc']?>">
            <div id = "addMapPoint"  style="visibility:hidden;">
                <input type="text" name = "inputMapPoint" value = "">
                <button type="button" onclick="addMapPoint()" class="btn btn-success">Dodaj</button>
            </div>
            <div id = "deleteMapPoint" >
                <button type="button" onclick="removeMapPoint()" class="btn btn-danger">Usuń</button>
            </div>
            <div class="col-12 mt-5" id = "Container_AddMapPoint">
                
                <?php echo $model['Map']?>
            </div>
        </div>
        <div class="row">
            <div class="col mt-5 rounded-3 shadow-sm border p-3">
            <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <textarea required maxlength="1000" name = "inputDutie"></textarea>
            </li>
            <button type="button" onclick="addEditDutes()" class="btn btn-success">Dodaj obowiazek</button>
            <input type="hidden" name="InputDuties">
            <h1 class="fs-3">Twój zakres obowiązków</h1>
            <ul class="list-group list-group-flush" id="containerDuties">
                <script>
                    var dutiesArray = [];
                </script>

                <?php
                    foreach($model['Duties'] as $content)
                    {
                        echo $content;
                    }
                ?>
                 
            </ul>
            </div>
        </div>
        <div class="row">
            <div class="col mt-5 rounded-3 shadow-sm border p-3">
            <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <textarea required maxlength="1000" name = "Textarea_requirements"></textarea>
                <button type="button" onclick="addEditRequirements()" class="btn btn-success">dodaj</button>
                <input type="hidden" name="InputRequirements">
            </li>
            <h1 class="fs-3">Nasze wymagania</h1>
            <ul class="list-group list-group-flush" id = "containerRequirements">
                <script>
                    var dutiesArray = [];
                </script>

                <?php
                    foreach($model['Requirements'] as $content)
                    {
                        echo $content;
                    }
                ?>
            </ul>
            <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                <textarea required maxlength="1000" name = "Textarea_welcome"></textarea>
                <button type="button" onclick="addEditWelcome()" class="btn btn-success">dodaj</button>
                <input type="hidden" name="InputWelcome">
            </li>
            <h1 class="fs-3">Mile widziane</h1>
            <ul class="list-group list-group-flush" id = "containerWelcome">
                <script>
                    var welcomeArray = [];
                </script>

                <?php
                    foreach($model['Welcome'] as $content)
                    {
                        echo $content;
                    }
                ?>
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
                    <button type="button" onclick="addEditBenefit()" class="btn btn-success">dodaj benefit</button>
                    <input type="hidden" name = "InputBenefits"> 
                </div>
            </div>
            <h2 class="fs-4">Benefity</h2>
            <div class="container" >
                <div class="row d-flex justify-content-start" id = "ContainerBenefits">
                    <script>
                        var benefitArray = [];
                        </script>       
                    <?php
                        foreach($model['Benefits'] as $content){
                            echo $content;
                        }
                    ?>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-5 border rounded-3 shadow-sm p-4">
            <textarea required maxlength="1000" name="TextAreaDescription"></textarea>
            <button type="button" onclick="addEditDescriptions()" class="btn btn-success">Add</button>
            <input type="hidden" name="InputDescriptions">
            </div>
            <div id = "ContainerDescription">
                <script>
                    var descriptionArray1 = [];
                </script>
                <?php 
                foreach($model['Description'] as $content){
                    echo $content;
                }
                ?>
            </div>
        </div>
       
        <div class="row">
            <button type="submit" class="col-12 m-3 btn btn-success border-1 rounded-3" name='add'>Edytuj </button>
        </div>
        </form>
        <div class="row">
            <div class="col mt-5 border rounded-3 p-3">
            <h1 class="fs-3">Dowiedz się więcej o Pracodawcy:</h1>
            <form  method="POST" action="<?php echo ROOT_URL; ?>company/profil">
                    <input type="hidden" name="id" value="<?php  echo $model['company_id']; ?>">
                    <button class="bg-transparent border-0">
                        Zobacz profil pracodawcy
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

<script src="<?php echo ROOT_Script ?>ads.js"></script>
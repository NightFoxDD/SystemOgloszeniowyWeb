<?php
    class Ad extends Model{
        public function Index(){
            // $this->query('SELECT * FROM ads ORDER BY create_date DESC');
            // $rows = $this->resultSet();
            // return $rows;
        }
        public function GetEditCategories($id){
            $this->query('SELECT category_id FROM `announcement` WHERE announcement_id = :id');
            $this->bind(":id",$id);
            $categoriesToCheck = $this->resultSet();
            $categoriesCheck = [];

            if($categoriesToCheck != null){
                $categoriesCheck = explode(";",$categoriesToCheck[0]['category_id']);
            }
            $this->query('SELECT * FROM `announcement_category`');
            $result = $this->resultSet();
            $categories = [];
            $data = [];
            foreach($result as $row){
                if($row){
                    $check = false;
                    if(in_array($row['category_id'],$categoriesCheck)){
                        $check = true;
                    }
                    $data = [
                    "id" => $row['category_id'],
                    "checked" => $check,
                    "name" => $row['name']
                    ];
                    ?>
                    
                    <?php
                    array_push($categories,$data);
                }
            }    
            $categoriesJson = json_encode($categories);
            ?>
            <script>
                    if (typeof categoriesArray === 'undefined') {
                    var categoriesArray = [];
                }
                categoriesArray.push('<?php echo $categoriesJson;?>');
            </script>
            <?php
            return $categories;
        }
        public function GetSelectedSubCategories($selected){
            $categoriesCheck = [];
            if($selected != null){
                $categoriesCheck = explode(";",$selected);
            }
            $this->query('SELECT * FROM `announcement_subcategory`');
            $result = $this->resultSet();
            $subcategories = [];
            $data = [];
            $check = false;

            foreach($result as $row){
                if($row){
                    $data = [
                        "id" => $row['subcategory_id'],
                        "checked" => $check,
                        "master_id" => $row['category_id'],
                        "name" => $row['name']
                        ];
                    foreach($categoriesCheck as $cat){
                        if(explode("_",$cat)[0] == $row['category_id'] && $row['subcategory_id'] == explode("_",$cat)[1]){
                            $check = true;
                            break;
                        }else{
                            $check = false;
                        }
                    }
                    $data['checked'] = $check;
                    array_push($subcategories,$data);
                }
            }

            $subcategoriesJson = json_encode($subcategories);
            ?>
            <script>
                    if (typeof subcategoriesArray === 'undefined') {
                    var subcategoriesArray = [];
                }
                subcategoriesArray.push('<?php echo $subcategoriesJson;?>');
            </script>
            <?php
            return $subcategories;
        }
        public function GetSelectedCategories($selected){
           
            $categoriesCheck = [];

            if($selected != null){
                $categoriesCheck = explode(";",$selected);
            }
            $this->query('SELECT * FROM `announcement_category`');
            $result = $this->resultSet();
            $categories = [];
            $data = [];
            foreach($result as $row){
                if($row){
                    $check = false;
                    if(in_array($row['category_id'],$categoriesCheck)){
                        $check = true;
                    }
                    $data = [
                    "id" => $row['category_id'],
                    "checked" => $check,
                    "name" => $row['name']
                    ];
                    ?>
                    
                    <?php
                    array_push($categories,$data);
                }
            }    
            $categoriesJson = json_encode($categories);
            ?>
            <script>
                    if (typeof categoriesArray === 'undefined') {
                    var categoriesArray = [];
                }
                categoriesArray.push('<?php echo $categoriesJson;?>');
            </script>
            <?php
            return $categories;
        }
        public function GetEditSubCategories($id){
            $this->query('SELECT subcategory_id FROM `announcement` WHERE announcement_id = :id');
            $this->bind(":id",$id);
            $categoriesToCheck = $this->resultSet();
            $categoriesCheck = [];

            if($categoriesToCheck != null){
                $categoriesCheck = explode(";",$categoriesToCheck[0]['subcategory_id']);
            }
            $this->query('SELECT * FROM `announcement_subcategory`');
            $result = $this->resultSet();
            $subcategories = [];
            $data = [];
            $check = false;

            foreach($result as $row){
                if($row){
                    $data = [
                        "id" => $row['subcategory_id'],
                        "checked" => $check,
                        "master_id" => $row['category_id'],
                        "name" => $row['name']
                        ];
                    foreach($categoriesCheck as $cat){
                        if(explode("_",$cat)[0] == $row['category_id'] && $row['subcategory_id'] == explode("_",$cat)[1]){
                            $check = true;
                            break;
                        }else{
                            $check = false;
                        }
                    }
                    $data['checked'] = $check;
                    array_push($subcategories,$data);
                }
            }

            $subcategoriesJson = json_encode($subcategories);
            ?>
            <script>
                    if (typeof subcategoriesArray === 'undefined') {
                    var subcategoriesArray = [];
                }
                subcategoriesArray.push('<?php echo $subcategoriesJson;?>');
            </script>
            <?php
            return $subcategories;
        }
        public function GetCategories(){
            $this->query('SELECT * FROM `announcement_category`');
            $result = $this->resultSet();
            $categories = [];
            $data = [];
            foreach($result as $row){
                if($row){
                    $data = [
                    "id" => $row['category_id'],
                    "checked" => false,
                    "name" => $row['name']
                    ];
                    ?>
                    
                    <?php
                    array_push($categories,$data);
                }
            }    
            $categoriesJson = json_encode($categories);
            ?>
            <script>
                    if (typeof categoriesArray === 'undefined') {
                    var categoriesArray = [];
                }
                categoriesArray.push('<?php echo $categoriesJson;?>');
            </script>
            <?php
            return $categories;
        }
        public function GetSubCategories(){
            $this->query('SELECT * FROM `announcement_subcategory`');
            $result = $this->resultSet();
            $subcategories = [];
            $data = [];
            foreach($result as $row){
                if($row){
                    $data = [
                    "id" => $row['subcategory_id'],
                    "checked" => false,
                    "master_id" => $row['category_id'],
                    "name" => $row['name']
                    ];
                    array_push($subcategories,$data);
                }
            }
            $subcategoriesJson = json_encode($subcategories);
            ?>
            <script>
                    if (typeof subcategoriesArray === 'undefined') {
                    var subcategoriesArray = [];
                }
                subcategoriesArray.push('<?php echo $subcategoriesJson;?>');
            </script>
            <?php
            return $subcategories;
        }
        public function edit($id){
            echo $id;
            echo "<pre>";
            print_r($_POST);
            echo "</pre>";
    
            $PositionLevel = $_POST['TBIinput_0'] . "_" . $_POST['TMP_Edit_Color_0'] . ";" . $_POST['TBIdescInput_0'];
            $ContractType = $_POST['TBIinput_1'] . "_" . $_POST['TMP_Edit_Color_1'] . ";" . $_POST['TBIdescInput_1'];
            $TimeRemaining = $_POST['TBIinput_2'] . "_" . $_POST['TMP_Edit_Color_2'] . ";" . $_POST['TBIdescInput_2'];
            $WorkType = $_POST['TBIinput_3'] . "_" . $_POST['TMP_Edit_Color_3'] . ";" . $_POST['TBIdescInput_3'];
            $ExpireDate = $_POST['TBIinput_4'] . "_" . $_POST['TMP_Edit_Color_4'] . ";" . $_POST['TBIdescInput_4'];
            $TypeOfEmployment = $_POST['TBIinput_5'] . "_" . $_POST['TMP_Edit_Color_5'] . ";" . $_POST['TBIdescInput_5'];
            $Localization = $_POST['TBIinput_6'] . "_" . $_POST['TMP_Edit_Color_6'] . ";" . $_POST['TBIdescInput_6'];

            $this->query("UPDATE `announcement` 
            SET `position_name` = :positionName,
                `localization` = :localization, 
                `position_level` = :positionLevel, 
                `contract_type` = :contractType, 
                `working_time` = :timeRemaining, 
                `work_type` = :workType, 
                `expire_date` = :expireDate, 
                `typeOfEmployment` = :typeOfEmployment,
                `duties` = :duties,
                `requirements` = :requirements,
                `benefits` = :benefits,
                `Map` = :map,
                `descriptions` = :descriptions,
                `category_id` = :categories,
                `subcategory_id` = :subcategories
            WHERE `announcement_id` = :id");
            $this->bind(':id', $id);
            $this->bind(':positionName', $_POST['input_PositionName']);
            $this->bind(':localization', $Localization);
            $this->bind(':timeRemaining', $TimeRemaining);
            $this->bind(':contractType', $ContractType);
            $this->bind(':expireDate', $ExpireDate);
            $this->bind(':positionLevel', $PositionLevel);
            $this->bind(':workType', $WorkType);
            $this->bind(':typeOfEmployment', $TypeOfEmployment);
            $this->bind(':duties', $_POST['InputDuties']);
            $this->bind(':requirements', $_POST['InputRequirements'] . "_" . $_POST['InputWelcome']);
            $this->bind(':descriptions', $_POST['InputDescriptions']);
            $this->bind(':map', $_POST['inputMapPoint2']);
            $this->bind(':benefits', $_POST['InputBenefits']);
            $this->bind(':categories', $_POST['SavedCategories']);
            $this->bind(':subcategories', $_POST['SavedSubCategories']);
            $this->single();

            return true;
        }
        public function getAds(){
            
            $this->query('SELECT * FROM `announcement` WHERE company_id = :id_company');
            $this->bind(':id_company',$_SESSION['user_data']['company_id']);
            $ad = $this->resultSet();
            $ads = [];
            foreach($ad as $item)
            {
                array_push($ads,$this->adsEditView($item));
            }
            return $ads;
        }
        public function delete($id){
            $this->query('DELETE FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            return true;
        }
        
        public function adsEditView($content){
            ob_start();
            ?>
                <div class="container">
                    <div class="row">
                        <div class="col d-flex">
                            <h3 class="m-2"><?php echo $content['position_name'];?></h3>   
                            <form method = "POST" action = "<?php echo ROOT_URL?>ads/goEdit">
                                <input type="hidden" name="id" value = "<?php echo $content['announcement_id']?>">
                                <button type = "submit" class="btn btn-warning m-2"> edit</button>
                            </form>
                            <form method = "POST" action = "<?php echo ROOT_URL?>ads/delete">
                                <input type="hidden" name="id" value = "<?php echo $content['announcement_id']?>">
                                <button type = "submit" class="btn btn-danger m-2"> delete</button> 
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function index_DescriptionsArray($id, $edit){
            $this->query('SELECT descriptions FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            $description = [];
            $count = 0;
            foreach(explode(";",$ad['descriptions']) as $content){
                if($content == "") break;
                if($edit)
                {
                    array_push($description,$this->edit_DescriptionView($content,$count));$count++;
                }
                else{
                    array_push($description,$this->index_DescriptionView($content));
                }
            }
            return $description;
        }
        public function edit_DescriptionView($content,$count){
            ob_start();
            ?>
                <div class="d-flex justify-content-center align-items-center">
                    <div id="containerContentDescrip_<?php echo $count?>" class="MyUncollapse col-12 mt-5 border rounded-3 shadow-sm p-4">
                        <h2 class="fs-4" name="divDescrip_<?php echo $count?>">
                            <?php echo $content?> 
                        </h2>
                    </div>
                    <div id="containerInputDescrip_<?php echo $count?>" class="MyCollapse col-12 mt-5 border rounded-3 shadow-sm p-4">
                        <textarea name="inputDescrip1_<?php echo $count?>" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"><?php echo $content?></textarea>
                    </div>
            
                    <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateDescriptionText('inputDescrip1_<?php echo $count?>','<?php echo $count?>'),RepeatText('inputDescrip1_<?php echo $count?>','divDescrip_<?php echo $count?>'),CollapseUncollapseForm('containerInputDescrip_<?php echo $count?>','containerContentDescrip_<?php echo $count?>'),changeImage('changeposition_image_TBI_Descrip_<?php echo $count?>','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI_Descrip_<?php echo $count?>" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                    <button type='button' onclick = 'deleteEditDescription(<?php echo $count; ?>)' class="btn btn-danger">Usuń</button>
                </div>
            <script>
                if (typeof descriptionArray === 'undefined') {
                    var descriptionArray = [];
                }
                descriptionArray.push('<?php echo addslashes($content); ?>');
            </script>
            <?php 
            $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_DescriptionView($content){
            ob_start();
            ?>
                <div class="col-12 mt-5 border rounded-3 shadow-sm p-4">
                    <?php  echo $content;  ?>
                </div>
            <?php 
            $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_BenefitsArray($id,$edit){
            $this->query('SELECT benefits FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            $benefits = [];
            $count = 0;
            foreach(explode(";",$ad['benefits']) as $content){
                if($content == "") break;
                if($edit){
                    array_push($benefits,$this->edit_BenefitsView($content,$count)); $count++;
                }else{
                    array_push($benefits,$this->index_BenefitsView($content));
                }

            }
            return $benefits;
        }
        public function edit_BenefitsView($content,$count){
            ob_start();
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 p-1">
                    <div class="rounded-3 shadow-sm border m-3 p-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                                <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                            </svg>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <div id="containerContentBenef_<?php echo $count?>" class="MyUncollapse">
                                <h2 class="fs-4" name="divBenef_<?php echo $count?>">
                                    <?php echo $content?> 
                                </h2>
                            </div>
                            <div id="containerInputBenef_<?php echo $count?>" class="MyCollapse">
                                <input type="text" name="inputBenef1_<?php echo $count?>" value="<?php echo $content?>" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                            </div>
                    
                            <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateBenefitText('inputBenef1_<?php echo $count?>','<?php echo $count?>'),RepeatText('inputBenef1_<?php echo $count?>','divBenef_<?php echo $count?>'),CollapseUncollapseForm('containerInputBenef_<?php echo $count?>','containerContentBenef_<?php echo $count?>'),changeImage('changeposition_image_TBI_Benef_<?php echo $count?>','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI_Benef_<?php echo $count?>" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                            <button type='button' onclick = 'deleteEditBenefit(<?php echo $count; ?>)' class="btn btn-danger">Usuń</button>
                        </div>
                    </div>
                </div> 
                <script>
                if (typeof benefitArray === 'undefined') {
                    var benefitArray = [];
                }
                benefitArray.push('<?php echo addslashes($content); ?>');
                </script>
            <?php 
            $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_BenefitsView($content){
            ob_start();
            ?>
                <div class="col-lg-3 col-md-6 col-sm-12 p-1">
                    <div class="rounded-3 shadow-sm border m-3 p-3">
                        <div class="d-flex justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="dodgerblue" class="bi bi-compass-fill mb-4" viewBox="0 0 16 16">
                                <path d="M15.5 8.516a7.5 7.5 0 1 1-9.462-7.24A1 1 0 0 1 7 0h2a1 1 0 0 1 .962 1.276 7.503 7.503 0 0 1 5.538 7.24m-3.61-3.905L6.94 7.439 4.11 12.39l4.95-2.828 2.828-4.95z" />
                            </svg>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <p class="text-center"><?php echo $content; ?></p>
                        </div>
                        
                    </div>
                </div> 
            <?php 
            $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_RequirementsArray($id,$edit){
            $this->query('SELECT requirements FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            $requirements = [];
            $count = 0;
            foreach(explode(";",explode("_",explode('_',$ad['requirements'])[0])[0]) as $content){
                if($content == "") break;
                if($edit){
                    array_push($requirements,$this->edit_RequirementsView($content,$count));
                    $count++;
                }else
                {
                    array_push($requirements,$this->index_RequirementsView($content));
                }
            }
            return $requirements;
        }
        
        public function index_WelcomesArray($id,$edit){
            $this->query('SELECT requirements FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            $welcome = [];
            $count = 0;
            if(explode("_",explode('_',$ad['requirements'])[1])[0] != ""){
                foreach(explode(";",explode("_",$ad['requirements'])[1]) as $content){
                    if($content == "") break;
                    if($edit){
                        array_push($welcome,$this->edit_WelocmeView($content,$count));$count++;
                    }else{
                        array_push($welcome,$this->index_WelocmeView($content));
                    }
                    
                }
            }else if (!$edit){
                array_push($welcome, $this->sorry());
            }
            
            return $welcome;
        }
        public function sorry(){
            ob_start();
            ?>
            <p>Przepraszam nie posiadamy</p>
            <?php
             $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function edit_RequirementsView($content,$count){
            ob_start();
            ?>
                <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                    <div id="containerContentRequi_<?php echo $count?>" class="MyUncollapse">
                        <h2 class="fs-4" name="divRequi_<?php echo $count?>">
                            <?php echo $content?> 
                        </h2>
                    </div>
                    <div id="containerInputRequi_<?php echo $count?>" class="MyCollapse">
                        <input type="text" name="inputRequi_<?php echo $count?>" value="<?php echo $content?>" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                    </div>
                 
                        <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateRequirementText('inputRequi1_<?php echo $count?>','<?php echo $count?>'),RepeatText('inputRequi1_<?php echo $count?>','divRequi_<?php echo $count?>'),CollapseUncollapseForm('containerInputRequi_<?php echo $count?>','containerContentRequi_<?php echo $count?>'),changeImage('changeposition_image_TBI_Requi_<?php echo $count?>','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI_Requi_<?php echo $count?>" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                    <button type='button' onclick = 'daleteEditRequirement(<?php echo $count; ?>)'class="btn btn-danger">Usuń</button>
            </li>

            <script>
                if (typeof requirementsArray === 'undefined') {
                    var requirementsArray = [];
                }
                requirementsArray.push('<?php echo addslashes($content); ?>');
            </script>
            <?php
             $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_RequirementsView($content){
            ob_start();
            ?>
            <li class="list-group-item border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            
                <?php echo $content; ?>
            </li>
            <?php
             $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function edit_WelocmeView($content,$count){
            ob_start();
            ?>
                <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                    <div id="containerContentWelcome_<?php echo $count?>" class="MyUncollapse">
                        <h2 class="fs-4" name="divWelcome_<?php echo $count?>">
                            <?php echo $content?> 
                        </h2>
                    </div>
                    <div id="containerInputWelcome_<?php echo $count?>" class="MyCollapse">
                        <input type="text" name="inputWelcome1_<?php echo $count?>" value="<?php echo $content?>" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                    </div>
                 
                        <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateWelcomeText('inputWelcome1_<?php echo $count?>','<?php echo $count?>'),RepeatText('inputWelcome1_<?php echo $count?>','divWelcome_<?php echo $count?>'),CollapseUncollapseForm('containerInputWelcome_<?php echo $count?>','containerContentWelcome_<?php echo $count?>'),changeImage('changeposition_image_TBI_Welcome_<?php echo $count?>','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI_Welcome_<?php echo $count?>" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                    <button type='button' onclick = 'deleteEditWelcome(<?php echo $count; ?>)' class="btn btn-danger">Usuń</button>
            </li>

            <script>
                if (typeof welcomeArray === 'undefined') {
                    var welcomeArray = [];
                }
                welcomeArray.push('<?php echo addslashes($content); ?>');
            </script>
            <?php
             $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_WelocmeView($content){
            ob_start();
            ?>
            <li class="list-group-item border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="gray" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            
                <?php echo $content; ?>
            </li>
            <?php
             $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_DutiesArray($id, $edit){
            $this->query('SELECT duties FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            $dutiesArray = [];
            $count = 0;
            foreach(explode(';',$ad['duties']) as $row)
            {
                if($row == "") break;
                if($edit){
                    array_push($dutiesArray,$this->edit_dutiesView($row,$count));$count++;
                }else{
                    array_push($dutiesArray,$this->index_dutiesView($row));
                }
                
            }
            return $dutiesArray;
        }
        public function edit_dutiesView($content,$count){
            ob_start();
            ?>
                <li class="list-group-item border-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
                    <div id="containerContentDuties_<?php echo $count?>" class="MyUncollapse">
                        <h2 class="fs-4" name="divDuties_<?php echo $count?>">
                            <?php echo $content?> 
                        </h2>
                    </div>
                    <div id="containerInputDuties_<?php echo $count?>" class="MyCollapse">
                        <input type="text" name="inputDuties1_<?php echo $count?>" value="<?php echo $content?>" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/>
                    </div>
                 
                        <button  type="button" class="btn btn-outline-secondary m-1" onclick="UpdateText('inputDuties1_<?php echo $count?>','<?php echo $count?>'),RepeatText('inputDuties1_<?php echo $count?>','divDuties_<?php echo $count?>'),CollapseUncollapseForm('containerInputDuties_<?php echo $count?>','containerContentDuties_<?php echo $count?>'),changeImage('changeposition_image_TBI_Duties_<?php echo $count?>','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI_Duties_<?php echo $count?>" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>

                    <button type='button' onclick = 'deleteEditDutie(<?php echo $count; ?>)' class="btn btn-danger">Usuń</button>
            </li>

            <script>
                if (typeof dutiesArray1 === 'undefined') {
                    var dutiesArray1 = [];
                }
                dutiesArray1.push('<?php echo addslashes($content); ?>');
            </script>
            <?php
             $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
        public function index_dutiesView($content){
            ob_start();
            ?>
            <li class="list-group-item border-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="dodgerblue" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </svg>
            
                <?php echo $content; ?>
            </li>
            <?php
             $content = ob_get_contents();
             ob_end_clean();
             return $content;
        }
       
        public function index_MapPointView($id){
            $this->query('SELECT * FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            ob_start();
            ?>
            <iframe src="<?php echo $ad['Map']; ?>" class="rounded-1" width="100%" height="350 rem" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function index_MapSrc($id){
            $this->query('SELECT * FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            return $ad['Map'];
        }
        public function index_PositionNameView($id){
            $this->query('SELECT * FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            $this->query('SELECT * FROM `company` WHERE company_id = :company_id');
            $this->bind(':company_id',$ad['company_id']);
            $company = $this->single();
            ob_start();
            ?>
                <div class="row">
                    <div class="col">
                        <h1><?php echo $ad['position_name']?> </h1>
                    </div>
                </div>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function index_CompanyImageView($id){
            $this->query('SELECT `imagelink` FROM `announcement` JOIN company on company.company_id = announcement.company_id WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $ad = $this->single();
            ob_start();
            ?>
                <input type='hidden' value="<?php echo $id ?>" name="id">
                <?php if ($ad['imagelink'] != "Swiftlly_transparent_FullName.png"): ?>
                    <img src="<?php echo ROOT_IMG_COMPANY . $ad['imagelink']; ?>" height="128" width="220" alt="Zdjęcie profilowe firmy">
                <?php else: ?>
                    <img src="<?php echo ROOT_IMG . 'Swiftlly_transparent_FullName.png'; ?>" height="128" width="220" alt="Zdjęcie profilowe firmy">
                <?php endif; ?>
             <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function index_BasicInformationsViews($id,$edit){
            $this->query('SELECT `position_level`,`contract_type`,`working_time`,`work_type`,expire_date,`typeOfEmployment`,`localization` FROM `announcement` WHERE announcement_id = :id');
            $this->bind(':id',$id);
            $result = $this->resultSet();
            $i = 0;
            $basicInformations = [];
            foreach($result[0] as $row){
                $title = explode('_',explode(';',$row)[0])[0];
                $color = "dodgerblue";
                if(sizeof(explode('_',explode(';',$row)[0])) > 1){
                    $color = explode('_',explode(';',$row)[0])[1];
                }
                
                $description = explode(';',$row)[1];
                $work = [
                    "count" => $i,
                    "color" => $color,
                    "title" => $title,
                    "description" => $description
                ];
                if($edit){
                    array_push($basicInformations,$this->edit_BasicInformatoinsTheme($work));
                }else{
                    array_push($basicInformations,$this->index_BasicInfromationsTheme($work));
                }
                $i = $i+1;
            }
            
            return $basicInformations;
        }
        public function edit_BasicInformatoinsTheme($item){
            $images = [
                '<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />',
                ' <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />',
                '<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />',
                '<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />',
                ' <path d="M0 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z" />',
                '<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" /><path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />',
                '<path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />'
            ];
            ob_start();
            ?>

                <div class='col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start'>
                <input type="color" id="TMP_Edit_Color_<?php echo $item['count']?>" name ="TMP_Edit_Color_<?php echo $item['count']?>" value="<?php echo $item['color']; ?>" onchange="ChangeTmpEditImageColor('<?php echo $item['count']; ?>')">
                    <div id = "divImage_<?php echo $item['count'];?>" class="float-start rounded-2 d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" id = "image_<?php echo $item['count'];?>" width="70" height="70" fill="<?php echo $item['color']?>" class="bi bi-clock-fill" viewBox="0 0 16 16">
                            <?php echo $images[$item['count']]?>
                        </svg>
                    </div>
                    <div class="p-4">
                        <div class="col">
                            <div id="containerContent_<?php echo $item['count']?>" class="MyUncollapse">
                                <h2 class="fs-4" name="TBIcontent_<?php echo $item['count']?>"><?php echo $item['title']?> </h2>
                            </div>
                            <div id="containerInput_<?php echo $item['count']?>" class="MyCollapse">
                                <h2><input type="text" name="TBIinput_<?php echo $item['count']?>" value="<?php echo $item['title']?>" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0"/><h2>
                            </div>
                        </div>
                        <div class="col">
                            <button id="btn_changeTBI" type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('TBIinput_<?php echo $item['count']?>','TBIcontent_<?php echo $item['count']?>'),CollapseUncollapseForm('containerInput_<?php echo $item['count']?>','containerContent_<?php echo $item['count']?>'),changeImage('changeposition_image_TBI_<?php echo $item['count']?>','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI_<?php echo $item['count']?>" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
                        </div>
                        <div class="col">
                            <div id="containerDescContent_<?php echo $item['count']?>" class="MyUncollapse">
                                <p class="fs-6 text-gray" name="TBIdescContent_<?php echo $item['count']?>"> <?php echo $item['description']?></p>
                            </div>
                            <div id="containerDescInput_<?php echo $item['count']?>" class="MyCollapse">
                                <input type="text" name="TBIdescInput_<?php echo $item['count']?>" value=" <?php echo $item['description']?>" class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0">
                            </div>
                        </div>
                        <div class="col">
                            <button id="btn_changeTBI" type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('TBIdescInput_<?php echo $item['count']?>','TBIdescContent_<?php echo $item['count']?>'),CollapseUncollapseForm('containerDescInput_<?php echo $item['count']?>','containerDescContent_<?php echo $item['count']?>'),changeImage('changeposition_image_TBIdesc_<?php echo $item['count']?>','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBIdesc_<?php echo $item['count']?>" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
                        </div>
                    </div>
                </div>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function index_BasicInfromationsTheme($item)
        {
            $images = [
                '<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />',
                ' <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />',
                '<path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z" />',
                '<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5m9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5m-2.6 5.854a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />',
                ' <path d="M0 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z" />',
                '<path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" /><path d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2z" />',
                '<path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />'
            ];
            ob_start();
            ?>
                <div class='col-lg-6 col-md-6 col-sm-12 d-flex justify-content-start'>
                    <div class="float-start rounded-2 d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="<?php echo $item['color']?>" class="bi bi-clock-fill" viewBox="0 0 16 16">
                            <?php echo $images[$item['count']]?>
                        </svg>
                    </div>
                    <div class="p-4">
                        <h2 class="fs-4">
                            <p id="PositionName_1"><?php echo $item['title']?></p>
                        </h2>
                        <p class="fs-6 text-gray">
                            <?php echo $item['description']?>
                        </p>
                    </div>
                </div>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function add(){
            // Sanitize POST
            echo"<pre>";
            print_r(($_POST));
            echo "</pre>";
            echo $_SESSION['user_data']['id'];
            $this->query('SELECT * FROM `company` WHERE user_id = :company_id');
            $this->bind(':company_id',$_SESSION['user_data']['id']);
            $company = $this->single();
            $Localization = $_POST['InputTitle_0'] . ";" . $_POST['InputDescription_0'];
            $TimeRemaining = $_POST['InputTitle_1'] . ";" . $_POST['InputDescription_1'];
            $ContractType = $_POST['InputTitle_2'] . ";" . $_POST['InputDescription_2'];
            $ExpireDate = $_POST['InputTitle_3'] . ";" . $_POST['InputDescription_3'];
            $PositionLevel = $_POST['InputTitle_4'] . ";" . $_POST['InputDescription_4'];
            $WorkType = $_POST['InputTitle_5'] . ";" . $_POST['InputDescription_5'];
            $TypeOfEmployment = $_POST['InputTitle_6'] . ";" . $_POST['InputDescription_6'];
            $this->query("INSERT INTO `announcement`(`company_id`,`position_name`,`localization`, `position_level`, `contract_type`, `working_time`, `work_type`, `expire_date`, `typeOfEmployment`,`duties`,`requirements`,`benefits`,`Map`,`descriptions`,`category_id`,`subcategory_id`) VALUES (:company_id,:positionName,:localization,:positionLevel,:contractType,:timeRemaining,:workType,:expireDate,:typeOfEmployment,:duties,:requirements,:benefits,:map,:description,:categories,:subcategories)");
            $this->bind(':company_id', $company['company_id']);
            $this->bind(':positionName', $_POST['input_PositionName']);
            $this->bind(':localization', $Localization);
            $this->bind(':timeRemaining', $TimeRemaining);
            $this->bind(':contractType', $ContractType);
            $this->bind(':expireDate', $ExpireDate);
            $this->bind(':positionLevel', $PositionLevel);
            $this->bind(':workType', $WorkType);
            $this->bind(':typeOfEmployment', $TypeOfEmployment);
            $this->bind(':duties', $_POST['InputDuties']);
            $this->bind(':requirements', $_POST['InputRequirements'] . "_" . $_POST['InputWelcome']);
            $this->bind(':description', $_POST['InputDescriptions']);
            $this->bind(':map', $_POST['inputMapPoint2']);
            $this->bind(':benefits', $_POST['InputBenefits']);
            $this->bind(':categories', $_POST['SavedCategories']);
            $this->bind(':subcategories', $_POST['SavedSubCategories']);

            $this->execute();
            

            return true;
        }
        public function Add_PositionNameView($id){
            $this->query('SELECT * FROM `announcement` WHERE announcement_id = :announcement_id');
            $this->bind(':announcement_id',$id);
            $company = $this->single();
            $companyName = "";
            if(isset($_SESSION['user_data']))
            {
                $this->query('SELECT name from company where user_id = :user_id');
                $this->bind(':user_id',$_SESSION['user_data']['id']);
                $row = $this->single();
                if(isset($row['name']))
                {
                    $companyName = $row['name'];
                }else
                {
                    $companyName = "Nie znaleziono nazwy firmy"; 
                }
            }
            if($id != null){
                $Title = $company['position_name'];
            }else{
                $Title = "Name";
            }
            ob_start();
            ?>
            <div class="container ">
                <div class="row">
                    <h1 id="Add_PositionName" class="col MyCollapse col">
                        <input type="TEXT" name='input_PositionName' class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0" value="<?php  echo $Title; ?>"> 
                    </h1>
                </div>
                <div class="row">
                    <div class="col MyUncollapse" id = "PositionName_View"> 
                        <h1 name = "PositionName">
                            <?php
                               echo $Title;
                            ?>
                        </h1>
                    </div>
                    
                </div>

            </div>
            <div class="  align-items-top justify-content-end">
                <button id="btn_changePositionName" type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('input_PositionName','PositionName'),CollapseUncollapseForm('PositionName_View','Add_PositionName'),changeImage('changeposition_image','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
            </div>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function remove($id) {
            if(intval($id) > 0) {
                $this->query('SELECT * FROM ads WHERE id =:id AND user_id = :user_id');
                $this->bind(':id', $id);
                $this->bind(':user_id', $_SESSION['user_data']['id']);
                $row = $this->single();
                if($row) {
                    $this->query('DELETE FROM ads WHERE id = :id;');
                    $this->bind(':id', $id);
                    $this->execute();
                return true;
                }
            }
            return false;
        }
        public function change($id) {
            // Sanitize POST
            $post = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            if($post['submit']) {
                if($post['title'] == '' || $post['content'] =='') {
                    Messages::setMsg('Proszę wypełnić wszystkie pola', 'error');
                    return false;
                }
                $this->query('UPDATE ads SET title = :title, content= :content WHERE id = :id AND user_id = :user_id;');
                $this->bind(':title', $post['title']);
                $this->bind(':content', $post['content']);
                $this->bind(':id', $id);
                $this->bind(':user_id', $_SESSION['user_data']
                ['id']);
                $this->execute();
                if($this->rowCount() > 0){
                    return true;
                }
            }
            return false;
        }
        public function get($id) {
            if(intval($id) > 0) {
                $this->query('SELECT * FROM ads WHERE id =:id;');
                $this->bind(':id', $id);
                return $this->single();
            }
            return null;
        }
        public function getCompanyID($id){
            $this->query('SELECT * FROM announcement where announcement_id = :id');
            $this->bind(':id', $id);
            $result = $this->single();
            if($result){
                return $result['company_id'];
            }
            
        }
        public function haveApplication($user_id,$id){
            $this->query('SELECT * FROM user_application where announcement_id = :id and user_id = :user_id');
            $this->bind(':id', $id);
            $this->bind(':user_id', $user_id);
            $result = $this->single();
            if(!empty($result)){
                return true;
            }else{
                return false;
            }
        }
        public function addApplication($id){ 
            $this->query("INSERT INTO `user_application`(`announcement_id`, `user_id`) VALUES (:id,:user_id)");
            $this->bind(":id",$id);
            $this->bind(":user_id",$_SESSION['user_data']['id']);
            $this->execute();
            return true;
        }
        public function deleteApplication($id,$user_id){
            $this->query("DELETE FROM `user_application` WHERE user_id = :user_id and announcement_id = :announcement_id");
            $this->bind(":announcement_id",$id);
            $this->bind(":user_id",$user_id);
            $this->execute();
            return true;
        }
    }
?>
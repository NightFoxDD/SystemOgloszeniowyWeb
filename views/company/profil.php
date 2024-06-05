
<form method="POST" action="<?php echo ROOT_URL?>company/saveProfil">
    
    <div class="container mt-5 mb-5">
        <div class=" border p-1 rounded-1 shadow-sm mb-5">
            <div class="row m-1 align-items-center justify-content-end">
                <div class="col-5">
                    
                    <?php if (!empty($model['informations']['imageLink']) && $model['informations']['imageLink'] != "Swiftlly_transparent_FullName.png"): ?>
                        <img src="<?php echo ROOT_IMG_COMPANY . $model['informations']['imageLink']; ?>" alt="Company Image">
                        <input type="hidden" name="imageName" value="<?php echo $model['informations']['imageLink'] ?>">
                    <?php else: ?>
                        <img src="<?php echo ROOT_IMG . 'Swiftlly_transparent_FullName.png'; ?>" alt="Default Image">
                        <input type="hidden" name="imageName" value="<?php echo 'Swiftlly_transparent_FullName.png'; ?>">
                    <?php endif; ?>
                    
                </div>
                <div class="col-7 container ">
                    <div class="row">
                        <div class="col-10">
                            <h1 id="Add_PositionName" class="MyCollapse">
                                <input type="TEXT" name='input_PositionName' class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0" value="<?php  echo $model['informations']['name'] ?>"> 
                            </h1>
                            <div class="MyUncollapse" id = "PositionName_View"> 
                                <h1 name = "PositionName">
                                    <?php
                                        echo $model['informations']['name']
                                    ?>
                                </h1>
                            </div>
                        </div>
                        <?php
                            if($_SESSION['is_logged_in'] && $_SESSION['user_data']['type'] == 3 && $_POST['id'] == $_SESSION['user_data']['company_id']){
                                ?>
                                    <input type="hidden" name="id" value="<?php echo $_SESSION['user_data']['company_id'] ?>">
                                    <div class="col align-items-top justify-content-end">
                                        <button id="btn_changePositionName" type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('input_PositionName','PositionName'),CollapseUncollapseForm('PositionName_View','Add_PositionName'),changeImage('changeposition_image','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
                                    </div>
                                <?php
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            
        </div>
        <div class="container border p-1 rounded-1 shadow-sm mb-5">
            <div class="row">
                <div class="col-11 container ">
                    <div class="row">
                        <div class="col-2">
                            <label class="fs-2 align-items-center">adres:</label>
                        </div>
                        <div class="col-8">
                            <h1 id="Add_adress" class="MyCollapse">
                                <input type="TEXT" name='input_adress' class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0" value="<?php  echo $model['informations']['adress'] ?>"> 
                            </h1>
                            <div class="MyUncollapse" id = "adress_View"> 
                                <h1 name = "adress">
                                    <?php
                                        echo $model['informations']['adress']
                                    ?>
                                </h1>
                            </div>
                        </div>
                        <?php if($_SESSION['is_logged_in'] && $_SESSION['user_data']['type'] == 3 && $_POST['id'] == $_SESSION['user_data']['company_id']){?>
                        <div class="col-2 d-flex align-items-center justify-content-end">
                            <button id="btn_changeadress" type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('input_adress','adress'),CollapseUncollapseForm('adress_View','Add_adress'),changeImage('adress_image','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="adress_image" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <?php if($_SESSION['is_logged_in'] && $_SESSION['user_data']['type'] == 3 && $_POST['id'] == $_SESSION['user_data']['company_id']){ ?>
        <div class="row">
            <label class="fs-2 align-items-center">Mapa:</label>
        </div>
        <div class="container border p-1 rounded-1  shadow-sm mb-5  align-items-center" id="map_View" >
            <div class="row">

                <div class="col-12 p-2">
                    
                    <div >
                        <input type="hidden" id="inputMapPoint2" name="inputMapPoint2" value="<?php  echo $model['informations']['localization_link'] ?>"/>
                        <input type="text" name = "inputMapPoint">
                        <button type="button" onclick="addMapPoint()">ADD</button>
                        <button type="button" onclick="removeMapPoint()">remove</button>
                    </div>
                    <div id = "mapno_View" class="MyUncollapse" > 
                        
                    </div>
                </div>
            </div>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-12 mt-5 mb-5" id = "Container_AddMapPoint">
                <?php if(!empty($model['informations']['localization_link'])){
                    ?>
                        <iframe src="<?php echo $model['informations']['localization_link'] ?>" class="rounded-1" width="100%" height="350 rem" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <?php
                }?>
                
            </div>
        </div>
        <?php if($_SESSION['is_logged_in'] && $_SESSION['user_data']['type'] == 3 && $_POST['id'] == $_SESSION['user_data']['company_id']){?>
        <div class="row">
            <label class="fs-2 align-items-center">Opis:</label>
        </div>
        <?php }?>
        <div class="container border p-3 rounded-1 shadow-sm mb-5">
            <div class="d-flex justify-content-center align-items-center">
                <div id="containerContentDescrip" class="MyUncollapse col-11">
                    <h2 class="fs-4" name="divDescrip">
                        <?php  echo $model['informations']['description']?> 
                    </h2>
                </div>
                <div id="containerInputDescrip" class="MyCollapse col-11 ">
                    <textarea name="inputDescrip1" class="border-bottom col-11 border-1 border-black border-top-0 border-start-0 border-end-0"><?php echo $model['informations']['description']?></textarea>
                </div>
                <?php if($_SESSION['is_logged_in'] && $_SESSION['user_data']['type'] == 3 && $_POST['id'] == $_SESSION['user_data']['company_id']){?>
                <button  type="button" class="btn btn-outline-secondary m-1" onclick="RepeatText('inputDescrip1','divDescrip'),CollapseUncollapseForm('containerInputDescrip','containerContentDescrip'),changeImage('changeposition_image_TBI_Descrip','<?php echo ROOT_IMG ?>/checked.png','<?php echo ROOT_IMG ?>/edit.png')"><img id="changeposition_image_TBI_Descrip" src="<?php echo ROOT_IMG ?>/edit.png" class="image-thumbnail" style="height:50px; weight:50px;"></button>
                <?php }?>
            </div>
        </div>
        <?php if($_SESSION['is_logged_in'] && $_SESSION['user_data']['type'] == 3 && $_POST['id'] == $_SESSION['user_data']['company_id']){?>
        <button type="submit" class="bg-transparent col-12 border rounded-3 p-3">zapisz</button>
        <?php }?>
    </div>
</form>
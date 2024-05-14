<?php
    class Ad extends Model{
        public function Index(){
            // $this->query('SELECT * FROM ads ORDER BY create_date DESC');
            // $rows = $this->resultSet();
            // return $rows;
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
                <div class="row">
                    <div class="col">
                        <h2 class="fs-5"><?php echo $company['name']; ?> <a href="" class="text-decoration-none ml-2" title="Dowiedz się więcej o danej firmie"> O firmie</a></h2>
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
                <img src="<?php echo ROOT_IMG_COMPANY ?><?php echo $ad['imagelink']?>" height="128" width="220" alt="Zdjęcie profilowe firmy">
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
        public function index_BasicInformationsViews($id){
            $this->query('SELECT `position_level`,`contract_type`,`working_time`,`work_type`,expire_date,`typeOfEmployment` FROM `announcement` WHERE announcement_id = :id');
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
                array_push($basicInformations,$this->index_BasicInfromationsTheme($work));
                $i = $i+1;
            }
            
            return $basicInformations;
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
            $ContractType = $_POST['InputTitle_2'] . ";" . $_POST['InputTitle_2'];
            $ExpireDate = $_POST['InputTitle_3'] . ";" . $_POST['InputDescription_3'];
            $PositionLevel = $_POST['InputTitle_4'] . ";" . $_POST['InputDescription_4'];
            $WorkType = $_POST['InputTitle_5'] . ";" . $_POST['InputDescription_5'];
            $TypeOfEmployment = $_POST['InputTitle_6'] . ";" . $_POST['InputDescription_6'];
            $this->query("INSERT INTO `announcement`(`company_id`,`position_name`,`localization`, `position_level`, `contract_type`, `working_time`, `work_type`, `expire_date`, `typeOfEmployment`,`duties`,`requirements`,`benefits`,`Map`,`descriptions`) VALUES (:company_id,:positionName,:localization,:positionLevel,:contractType,:timeRemaining,:workType,:expireDate,:typeOfEmployment,:duties,:requirements,:benefits,:map,:description)");
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
            $this->bind(':map', $_POST['InputMapPoint']);
            $this->bind(':benefits', $_POST['InputBenefits']);
            $this->execute();

            return true;
        }
        public function Add_PositionNameView(){
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
            ob_start();
            ?>
            <div class="container ">
                <div class="row">
                    <h1 id="Add_PositionName" class="col MyCollapse col">
                        <input type="TEXT" name='input_PositionName' class="border-bottom border-1 border-black border-top-0 border-start-0 border-end-0" value="Name"> 
                    </h1>
                </div>
                <div class="row">
                    <div class="col MyUncollapse" id = "PositionName_View"> 
                        <h1 name = "PositionName">Name</h1>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <h2 class="fs-5"><?php echo $companyName;?> <a href="" class="text-decoration-none ml-2" title="Dowiedz się więcej o danej firmie"> O firmie</a></h2>
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
    }
?>
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
        public function index_CompanyImage($id){
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
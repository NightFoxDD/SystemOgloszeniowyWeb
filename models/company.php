<?php
class Company extends Model{
    public function adsView($item){
        $this->query("SELECT * FROM `company` WHERE company_id = :company_id");
        $this->bind(':company_id',$item['company_id']);
        $company = $this->single();
        ob_start();
        ?>
            <div class="container mb-2 mt-2 ml-5 mr-5">
                <div class="card shadow-sm p-2">
                    <form method="POST" class="m-2" action = "<?php echo ROOT_URL; ?>ads/index">
                        <input type="hidden" value="<?php echo $item['announcement_id']?>" name='id'>
                        <button class='bg-transparent border-0 p-0 col-12 border-transparent rounded-0'>
                            <li class="list-group-item container">
                                <div class="row">
                                    <div class="col align-items-center">
                                        <div class="float-start">
                                            <p class="h4"><a href="<?php echo ROOT_URL; ?>ads/index?id=<?php echo $item['announcement_id']?>" class="text-decoration-none text-black"> <?php echo explode(';',explode('_',$item['position_name'])[0])[0]; ?></a></p>
                                            <p><?php echo explode(';',$item['expire_date'])[1] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div class="row">
                                        <?php
                                                    if($company['imageLink'] != "Swiftlly_transparent_FullName.png"){
                                                        ?>
                                                        <img src="<?php echo ROOT_IMG_COMPANY.$company['imageLink'] ?>" class="col-5 img-fluid" alt="image">
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <img src="<?php echo ROOT_IMG."Swiftlly_transparent_FullName.png"; ?>" class=" col-5 img-fluid" alt="image">
                                                        <?php
                                                    }
                                                    ?>
                                            <div class="col">
                                                <p class="h4"><?php echo $company['name'];?></p>
                                                <p><?php echo $company['adress'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </button>
                    </form>
                </div>
            </div>
            
        <?php
         $content = ob_get_contents();
         ob_end_clean();
         return $content;
    }
    public function saveProfil($id){
        $this->query("UPDATE `company` SET `name` = :name, `adress` = :adress, `localization_link` = :localizationlink, `imageLink` = :imagelink, `description` = :description WHERE `company_id` = :id");
        $this->bind(":id", $id);
        $this->bind(":name", $_POST['input_PositionName']);
        $this->bind(":adress", $_POST['input_adress']);
        $this->bind(":localizationlink", $_POST['inputMapPoint2']);
        $this->bind(":imagelink", $_POST['imageName']);
        $this->bind(":description", $_POST['inputDescrip1']);
        $this->execute();
        return true;
    }
    public function getMap($id){
        $this->query("SELECT * FROM `announcement` WHERE company_id = :company_id limit 10");
        $this->bind(":company_id",$id);
        $result = $this->single();
        ob_start();
        ?>
            
        <?php
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
    public function getAdvertisements($id){
        $this->query("SELECT * FROM `announcement` WHERE company_id = :company_id limit 10");
        $this->bind(":company_id",$id);
        $result = $this->resultSet();
        $data = [];
        foreach($result as $row){
            if($row){
                $item = [
                "announcement_id" => $row['announcement_id'],
                "position_name" => $row['position_name'],
                "expire_date" => $row['expire_date'],
                "company_id" => $row['company_id']
                ];
                array_push($data, $this->adsView($item));
            }
        }
        return $data;
    }
    public function getInformations($id){
        $this->query("SELECT * FROM `company` WHERE company_id = :company_id");
        $this->bind(':company_id',$id);
        return $this->single();
    }
}
?>
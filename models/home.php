<?php
    class Home extends Model{
        public function getLastAdsView($item){
            $this->query("SELECT * FROM `company` WHERE company_id = :company_id");
            $this->bind(':company_id',$item['company_id']);
            $company = $this->single();
            ob_start();
            ?>
                
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3 mb-3">
                    <div class="card shadow-sm p-2">
                        <form method="POST" class="m-2" action = "<?php echo ROOT_URL; ?>ads/index">
                            <input type="hidden" value="<?php echo $item['announcement_id']?>" name='id'>
                            <button class='bg-transparent border-0 p-0 border-transparent rounded-0'>
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
                                                <div class="col-7">
                                                    <?php
                                                    if($company['imageLink'] != "Swiftlly_transparent_FullName.png"){
                                                        ?>
                                                        <img src="<?php echo ROOT_IMG_COMPANY.$company['imageLink'] ?>" class="img-fluid" alt="image">
                                                        <?php
                                                    }else{
                                                        ?>
                                                        <img src="<?php echo ROOT_IMG."Swiftlly_transparent_FullName.png"; ?>" class="img-fluid" alt="image">
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                                
                                                <div class="col-5">
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
        public function getLastAdsViewSearch($item){
            $this->query("SELECT * FROM `company` WHERE company_id = :company_id");
            $this->bind(':company_id',$item['company_id']);
            $company = $this->single();
            ob_start();
            ?>
                
                <div class="container mb-2 mt-2">
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
                                            <?php if ($company['imageLink'] != "Swiftlly_transparent_FullName.png"): ?>
                                                <img src="<?php echo ROOT_IMG_COMPANY . $company['imageLink']; ?>" class="col img-fluid" alt="image">
                                            <?php else: ?>
                                                <img src="<?php echo ROOT_IMG . 'Swiftlly_transparent_FullName.png'; ?>" class="col img-fluid" alt="image">
                                            <?php endif; ?>
                                              
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
        public function getLastAdsArray(){
            $this->query("SELECT * FROM `announcement` ORDER BY `announcement_id` LIMIT 6");
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
                    
                    array_push($data, $this->getLastAdsView($item));
                }
            }
            return $data;
        }
        public function search($text,$category,$localization){
            $query = "SELECT * FROM `announcement` WHERE position_name LIKE CONCAT('%', '". $text ."', '%')";
            if($category != "" && $category != -1){
                $query = $query . " AND category_id LIKE CONCAT('%', '". $category .";" ."', '%')";
            }
            if($localization != ""){
                $query = $query . " AND position_level LIKE CONCAT('%', '". $localization ."', '%')";
            }
            $this->query($query);
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
                    
                    array_push($data, $this->getLastAdsViewSearch($item));
                }
            }
            return $data;
        }
        public function searchView($text,$category,$subcategory,$localization){

            $query = "SELECT * FROM `announcement` WHERE position_name LIKE CONCAT('%', '". $text ."', '%')";
            if($category != "" && $category != -1){
                
                foreach(explode(";",$category) as $item){
                    if($item != ""){
                        $query = $query . " and announcement_id in (SELECT announcement_id FROM announcement WHERE category_id LIKE '%". $item ."%')";
                    }
                }
            }
            if($subcategory != ""){
                foreach(explode(";",$subcategory) as $item){
                    if($item != ""){
                    $query = $query . "and announcement_id in (SELECT announcement_id FROM announcement WHERE subcategory_id LIKE '%". $item ."%')";
                    }
                }
            }
            if($localization != ""){
                $query = $query . " AND position_level LIKE CONCAT('%', '". $localization ."', '%')";
            }
           
            $this->query($query);
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
                    
                    array_push($data, $this->getLastAdsViewSearch($item));
                }
            }
            return $data;
        }
        public function getComapnyProfiles(){
            $this->query("SELECT * FROM `company` LIMIT 10");
            $result = $this->resultSet();
            $companies = [];
            foreach($result as $row){
                if($row){
                    array_push($companies, $this->companyProfilView($row['company_id']));
                }
            }
            return $companies;
        }
        public function companyProfilView($id){
            $this->query("SELECT * FROM `company` WHERE company_id = :company_id");
            $this->bind(':company_id', $id);
            $company = $this->single();
            ob_start();
            ?>
                <div class="item">
                    <form method="post" action="<?php echo ROOT_URL; ?>company/profil">
                        <button class="card bg-transparent border-1" style="width: 18rem;">
                            <input type="hidden" name="id" value="<?php echo $company['company_id'] ?>">
                            <?php 
                                if($company['imageLink'] != "Swiftlly_transparent_FullName.png"){
                                    ?>
                                    <img src="<?php echo ROOT_IMG_COMPANY.$company['imageLink'] ?>" class="img-fluid p-2" alt="image">
                                    <?php
                                }else{
                                    ?>
                                    <img src="<?php echo ROOT_IMG."Swiftlly_transparent_FullName.png"; ?>" class="img-fluid p-2" alt="image">
                                    <?php
                                }
                            ?>
                            
                            <div class="card-body">
                                <h5 class="card-title text-center p-2"><?php echo $company['name'] ?></h5>
                            </div>
                        </button>
                    </form>
                </div>
            <?php
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }
?>
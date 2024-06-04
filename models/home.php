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
                                                <img src="<?php echo ROOT_IMG_COMPANY ?><?php echo $company['imageLink']?>" class="col img-fluid" alt="image">
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
                                                <img src="<?php echo ROOT_IMG_COMPANY ?><?php echo $company['imageLink']?>" class="col img-fluid" alt="image">
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
    }
?>
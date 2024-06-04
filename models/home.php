<?php
    class Home extends Model{
        public function getLastAdsView($item){
            $this->query("SELECT * FROM `company` WHERE company_id = :company_id");
            $this->bind(':company_id',$item['company_id']);
            $company = $this->single();
            ob_start();
            ?>
                
                <div class="col-lg-4 col-md-6 col-sm-12 mt-3 mb-3">
                    <div class="card shadow-sm">
                        <ul class="list-group list-group-flush">
                            <form method="POST" action = "<?php echo ROOT_URL; ?>ads/index">
                                <input type="hidden" value="<?php echo $item['announcement_id']?>" name='id'>
                                <button class='bg-transparent border-0 p-0 border-transparent rounded-0'>
                                    <li class="list-group-item container">
                                        <div class="row">
                                            <div class="col align-items-center">
                                                <div class="float-start">
                                                    <p class="h4"><a href="<?php echo ROOT_URL; ?>ads/index?id=<?php echo $item['announcement_id']?>" class="text-decoration-none text-black"> <?php echo explode(';',explode('_',$item['position_name'])[0])[0]; ?></a></p>
                                                    <p><?php echo explode(';',$item['expire_date'])[1] ?></p>
                                                </div>
                                                <div class="float-end">
                                                    <a class=" text-decoration-none text-black" href="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                        </svg>
                                                    </a>
                                                    <!--                                             
                                                        <a class="float-end text-decoration-none text-black" href="">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg> 
                                                        </a>    
                                                    -->
                                                    <a class=" text-decoration-none text-black" href="">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                                                        </svg>
                                                    </a>
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
                        </ul>
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
                    
                    array_push($data, $this->getLastAdsView($item));
                }
            }
            return $data;
        }
        public function searchView($text,$category,$subcategory,$localization){

            $query = "SELECT * FROM `announcement` WHERE position_name LIKE CONCAT('%', '". $text ."', '%')";
            if($category[0] != ";" && $category != "" && $category != -1){
                
                foreach(explode(";",$category) as $item){
                    if($item != ""){
                        $query = $query . " or announcement_id in (SELECT announcement_id FROM announcement WHERE category_id LIKE CONCAT('%', '". $item ."', '%'))";
                    }
                }
            }
            if($subcategory != ""){
                foreach(explode(";",$subcategory) as $item){
                    if($item != ""){
                    $query = $query . " or subcategory_id LIKE CONCAT('%', '". $item .";" ."', '%')";
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
                    
                    array_push($data, $this->getLastAdsView($item));
                }
            }
            return $data;
        }
    }
?>
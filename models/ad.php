<?php
    class Ad extends Model{
        public function Index(){
            // $this->query('SELECT * FROM ads ORDER BY create_date DESC');
            // $rows = $this->resultSet();
            // return $rows;
        }
        public function add(){
            // Sanitize POST
            echo"<pre>";
            print_r(($_POST));
            echo "</pre>";
            echo $_SESSION['user_data']['id'];
            if($_POST("add"))
            {
                
            }
            die();
            return false;
        }
        public function Add_PositionNameView(){
            $companyName = "";
            if(isset($_SESSION['user_data']))
            {
                $this->query('SELECT name from company where user_id = :user_id');
                $this->bind(':user_id',$_SESSION['user_data']['id']);
                $row =   $this->single();
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
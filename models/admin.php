<?php
class Admin extends Model{
    public function getCategories(){
        $this->query('SELECT * FROM `announcement_category`');
        $result = $this->resultSet();
        $categories = [];
        foreach($result as $row){
            if($row){
                $data = [
                "id" => $row['category_id'],
                "name" => $row['name']
                ];
                
                array_push($categories,$data);
            }
        }
        return $categories;
    }
    public function addCategory($name){
        if($name == ""){
            Messages::setMsg("Nie wpisano nazwy kategori","error"); 
            return false;
        }
        $this->query("SELECT * from `announcement_category` where name = :name");
        $this->bind(":name",$name);
        $result = $this->resultSet();
        if(count($result) > 0){
            Messages::setMsg("Nie dodano kategori poniewaz juz istnieje taka kategoria z taka nazwa","error"); 
            return false;
        }
        $this->query("INSERT INTO `announcement_category`(`name`) VALUES (:name)");
        $this->bind(":name",$name);
        $this->single();
        return true;
    }
    public function removeCategory($id){
        $this->query("DELETE FROM `announcement_subcategory` WHERE category_id = :id");
        $this->bind(":id",$id);
        $this->single();
        $this->query("DELETE FROM `announcement_category` WHERE category_id = :id");
        $this->bind(":id",$id);
        $this->single();
        
        return true;
    }
    public function getSubCategories($id){
        $this->query('SELECT * FROM `announcement_subcategory` where category_id = :id');
        $this->bind(":id",$id);
        $result = $this->resultSet();
        $subcategories = [];
        $data = [];
        foreach($result as $row){
            if($row){
                $data = [
                "id" => $row['subcategory_id'],
                "master_id" => $row['category_id'],
                "name" => $row['name']
                ];
                
                array_push($subcategories,$data);
            }
        }
        return $subcategories;
    }
    public function addSubCategory($id,$name){
        if($name == ""){
            Messages::setMsg("Nie wpisano nazwy podkategori","error"); 
            return false;
        }
        $this->query("SELECT * from `announcement_subcategory` where name = :name and category_id = :category_id");
        $this->bind(":name",$name);
        $this->bind(":category_id",$id);
        $result = $this->resultSet();
        if(count($result) > 0){
            Messages::setMsg("Nie dodano takiej podkategori poniewaz juz istnieje taka podkategoria z taka nazwa","error"); 
            return false;
        }
        $this->query("INSERT INTO `announcement_subcategory`(`category_id`,`name`) VALUES (:id,:name)");
        $this->bind(":name",$name);
        $this->bind(":id",$id);
        $this->single();
        return true;
    }
    public function removeSubCategory($id,$master_id){
        $this->query("DELETE FROM `announcement_subcategory` WHERE category_id = :master_id and subcategory_id = :id");
        $this->bind(":master_id",$master_id);
        $this->bind(":id",$id);
        $this->single();
        return true;
    }
}
?>
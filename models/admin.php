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
    public function getSubCategories($id,$name){
        $this->query('SELECT * FROM `announcement_subcategory` where category_id = :id');
        $this->bind(":id",$id);
        $result = $this->resultSet();
        $subcategories = [];
        $data = [
            "id" => $id,
            "name" => $name
            ];
        array_push($subcategories,$data);
        foreach($result as $row){
            if($row){
                $data = [
                "id" => $row['category_id'],
                "name" => $row['name']
                ];
                
                array_push($subcategories,$data);
            }
        }
        return $subcategories;
    }
}
?>
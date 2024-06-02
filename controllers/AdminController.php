<?php
    class AdminController extends Controller{
        protected function getName() {
            return 'admin';
        }
        protected function Index(){
            $this->returnView('index');
        } 
        protected function Categories(){
            $adminModel = new admin();
            $model = [ 
                "Categoies" => $adminModel->getCategories()
                ];
            $this->returnView('categories',$model);
        }
        protected function SubCategoiers(){
            $adminModel = new admin();
            $model = [ 
                "SubCategoies" => $adminModel->getSubCategories($_POST['id'],$_POST['name'])
                ];
            $this->returnView('subcategories',$model);
        }
    } 
?>
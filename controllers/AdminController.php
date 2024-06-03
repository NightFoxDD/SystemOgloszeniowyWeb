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
        protected function addCategories(){
            $adminModel = new admin();
            
            if($adminModel->addCategory($_POST['name'])){
                Messages::setMsg("Dodano kategorie","success"); 
            }
            $model = [ 
                "Categoies" => $adminModel->getCategories()
                ];
            $this->returnView('categories',$model);
        }
        protected function removeCategories(){
            $adminModel = new admin();
            
            if($adminModel->removeCategory($_POST['id'])){
                Messages::setMsg("Dodano kategorie","success"); 
            }
            $model = [ 
                "Categoies" => $adminModel->getCategories()
                ];
            $this->returnView('categories',$model);
        }
        protected function SubCategoiers(){
            $adminModel = new admin();
            $model = [ 
                "Master" => [$_POST['id'],$_POST['name']],
                "SubCategoies" => $adminModel->getSubCategories($_POST['id'])
                ];
            $this->returnView('subcategories',$model);
        }
        protected function addSubCategories(){
            $adminModel = new admin();
            if($adminModel->addSubCategory($_POST['id'],$_POST['name'])){
                Messages::setMsg("Dodano podkategorie","success"); 
            }
            $model = [ 
                "Master" => [$_POST['id'],$_POST['name']],
                "SubCategoies" => $adminModel->getSubCategories($_POST['id'])
                ];
            $this->returnView('subcategories',$model);
        }
        protected function removeSubCategories(){
            $adminModel = new admin();
            
            if($adminModel->removeSubCategory($_POST['id'],$_POST['master_id'])){
                Messages::setMsg("Usunięto podkategorie","success"); 
            }
            $model = [ 
                "Master" => [$_POST['master_id'],$_POST['name']],
                "SubCategoies" => $adminModel->getSubCategories($_POST['master_id'])
                ];
            $this->returnView('subcategories',$model);
        }
    } 
?>
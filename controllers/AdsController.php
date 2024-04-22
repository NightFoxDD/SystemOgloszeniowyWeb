<?php
    class AdsController extends Controller{
        protected function Index(){
            $model = new Ad();
            $model = [
                // "userData"=>$userModel->getUserData(),
               
            ];
            $this->returnView('index', $model);
        }
        protected function getName() {
            return 'ads';
        }
        protected function addView(){
            $this->returnView('add');
        }
        protected function editView(){
            $this->returnView('edit');
        }
        protected function add(){

        }
    }
?>
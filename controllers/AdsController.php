<?php
    class AdsController extends Controller{
        protected function Index(){
            $adsModel = new Ad();
            $model = [
                 
            ];
            $this->returnView('index', $model);
        }
        protected function getName() {
            return 'ads';
        }
        protected function addView(){
            $adsModel = new Ad();
            $model = [
                 "add_PositionName"=>$adsModel->Add_PositionNameView(),
            ];
            $this->returnView('add', $model);
        }
        protected function editView(){
            $this->returnView('edit');
        }
        protected function add(){
            $model = new ad();
            if($model->add())
            {
                Messages::setMsg("Dodano ogłoszenie","success");
                $this->redirect('company', 'index');
            }
            else {
                Messages::setMsg("Nie dodano ogłoszenia", "error");
                $this->redirect('company', 'index');
            }
        }
    }
?>
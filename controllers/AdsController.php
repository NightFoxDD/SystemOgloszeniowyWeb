<?php
    class AdsController extends Controller{
        protected function Index(){
            $adsModel = new Ad();
            $model = [
                "CompanyImage"=> $adsModel->index_CompanyImageView($_POST['id']), 
                "PositionName" => $adsModel->index_PositionNameView($_POST['id']),
                "BasicInformations" => $adsModel->index_BasicInformationsViews($_POST['id']),
                "Map" => $adsModel->index_MapPointView($_POST['id']),
                "Duties" => $adsModel->index_DutiesArray($_POST['id']),
                "Requirements" => $adsModel->index_RequirementsArray($_POST['id']),
                "Welcome" => $adsModel->index_WelcomesArray($_POST['id']),
                "Benefits" => $adsModel->index_BenefitsArray($_POST['id']),
                "Description" => $adsModel->index_DescriptionsArray($_POST['id'])
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
            $adsmodel = new ad();
            $model = [
                "ads" => $adsmodel->getAds(),
            ];
            $this->returnView('edit',$model);
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
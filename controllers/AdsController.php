<?php
    class AdsController extends Controller{
        protected function Index(){
            $adsModel = new Ad();
            $model = [
                "id" => $_POST['id'],
                "company_id" => $adsModel->getCompanyID($_POST['id']),
                "CompanyImage"=> $adsModel->index_CompanyImageView($_POST['id']), 
                "PositionName" => $adsModel->index_PositionNameView($_POST['id']),
                "BasicInformations" => $adsModel->index_BasicInformationsViews($_POST['id'],false),
                "Map" => $adsModel->index_MapPointView($_POST['id']),
                "Duties" => $adsModel->index_DutiesArray($_POST['id'],false),
                "Requirements" => $adsModel->index_RequirementsArray($_POST['id'],false),
                "Welcome" => $adsModel->index_WelcomesArray($_POST['id'],false),
                "Benefits" => $adsModel->index_BenefitsArray($_POST['id'],false),
                "Description" => $adsModel->index_DescriptionsArray($_POST['id'],false),
                "application" => $adsModel->haveApplication($_SESSION['user_data']['id'],$_POST['id'])
            ];
            
            $this->returnView('index', $model);
        }
        protected function getName() {
            return 'ads';
        }
        protected function addView(){
            $adsModel = new Ad();
            $model = [
                 "company_id" => $_SESSION['user_data']['company_id'],
                 "add_PositionName"=>$adsModel->Add_PositionNameView(null),
                 "Categories" => $adsModel->GetCategories(),
                 "SubCategories" => $adsModel->GetSubCategories()
            ];
            $this->returnView('add', $model);
        }
        protected function editView(){
            $adsmodel = new ad();
            $model = [
                "ads" => $adsmodel->getAds(),
            ];
            $this->returnView('editChose',$model);
        }
        protected function delete(){
            $adsmodel = new ad();
            if($adsmodel->delete($_POST['id']))
            {
                Messages::setMsg("Usunięto ogłoszenie","success");
                $this->redirect('ads', 'editView');
            }
            else {
                Messages::setMsg("Nie usunięto ogłoszenia", "error");
                $this->redirect('ads', 'editView');
            }
        }
        protected function application(){
            $adsmodel = new ad();
            if($adsmodel->addApplication($_POST['announcment_id']))
            {
                Messages::setMsg("Zaaplikowano się do ogłoszenie","success");
                $this->redirect('home','index');
            }
        }
        protected function goEdit(){
            $adsModel = new ad();
            $model = [
                "company_id" => $adsModel->getCompanyID($_POST['id']),
                "CompanyImage"=> $adsModel->index_CompanyImageView($_POST['id']), 
                "add_PositionName"=>$adsModel->Add_PositionNameView($_POST['id']),
                "PositionName" => $adsModel->index_PositionNameView($_POST['id']),
                "BasicInformations" => $adsModel->index_BasicInformationsViews($_POST['id'],true),
                "Map" => $adsModel->index_MapPointView($_POST['id']),
                "MapSrc" => $adsModel->index_MapSrc($_POST['id']),
                "Duties" => $adsModel->index_DutiesArray($_POST['id'],true),
                "Requirements" => $adsModel->index_RequirementsArray($_POST['id'],true),
                "Welcome" => $adsModel->index_WelcomesArray($_POST['id'],true),
                "Benefits" => $adsModel->index_BenefitsArray($_POST['id'],true),
                "Description" => $adsModel->index_DescriptionsArray($_POST['id'],true),
                "Categories" => $adsModel->GetEditCategories($_POST['id']),
                "SubCategories" => $adsModel->GetEditSubCategories($_POST['id'])
            ];
            $this->returnView('edit', $model);
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
        protected function edit(){
            $model = new ad();
            if($model->edit($_POST['id']))
            {
                Messages::setMsg("Edytowano ogłoszenie","success");
                $this->redirect('ads', 'editView');
            }
            else {
                Messages::setMsg("Nie edytowano ogłoszenia", "error");
                $this->redirect('ads', 'editView');
            }
        }
        protected function deleteApplication(){
            $model = new ad();
            if($model->deleteApplication($_POST['announcement_id'],$_SESSION['user_data']['id'])){
                Messages::setMsg("Edytowano ogłoszenie","success");
                $this->redirect('users', 'profil');
            }
        }
    }
?>
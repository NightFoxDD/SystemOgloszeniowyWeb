<?php
    class CompanyController extends Controller{
        protected function getName() {
            return 'company';
        }
        protected function Index(){
            $this->returnView('index');
        } 
        protected function profil(){
            $companyModel = new company();
            $model = [
                "advertisements" => $companyModel->getAdvertisements(),
                "informations" => $companyModel->getInformations($_SESSION['user_data']['company_id'])
            ];
            $this->returnView('profil', $model);
        }
    } 
?>
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
            $id = 1;
            if(empty($_SESSION['user_data']['company_id'])){
                $id = $_SESSION['user_data']['company_id'];
            }else{
                $id = $_POST['id'];
            }
            $model = [
                "advertisements" => $companyModel->getAdvertisements(),
                "informations" => $companyModel->getInformations($id)
            ];
            $this->returnView('profil', $model);
        }
        protected function saveProfil(){
            $companyModel = new company();
            if ($companyModel->saveProfil($_SESSION['user_data']['company_id'])) {
                Messages::setMsg("Zapisano dane","success");
            }
            else {
                Messages::setMsg("Nie zapisano danych", "error");
            }
            $model = [
                "advertisements" => $companyModel->getAdvertisements(),
                "informations" => $companyModel->getInformations($_SESSION['user_data']['company_id'])
            ];
            $this->returnView('profil', $model);
        }
    } 
?>
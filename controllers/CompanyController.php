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
            if(isset($_POST['id'])){
                $id = $_POST['id'];
            }
            if(isset($_SESSION['user_data']['company_id'])){
                $id = $_SESSION['user_data']['company_id'];
            }
            $model = [
                "advertisements" => $companyModel->getAdvertisements($id),
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
                "advertisements" => $companyModel->getAdvertisements($_SESSION['user_data']['company_id']),
                "informations" => $companyModel->getInformations($_SESSION['user_data']['company_id'])
            ];
            $this->returnView('profil', $model);
        }
    } 
?>
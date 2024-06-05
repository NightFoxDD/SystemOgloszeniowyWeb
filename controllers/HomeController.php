<?php
class HomeController extends Controller{ 
    protected function getName() {
        
        return 'home';
    }
    protected function Index(){
        
        $homeModel = new Home();
        $adsModel = new ad();
        $model = [
            "lastAds"=>$homeModel->getLastAdsArray(),
            "categories"=>$adsModel->getCategories(),
            "companies"=>$homeModel->getComapnyProfiles()
        ];
        $this->returnView('index',$model);
    }
    protected function search(){
        $adsModel = new ad();
        $homeModel = new home();
        $model = [
            "Advertisements" => $homeModel->search($_POST['name'],$_POST['category'],$_POST['localization']),
            "categories"=>$adsModel->getCategories(),
            "subcategories"=>$adsModel->GetSubCategories() 
        ];
        $this->returnView('searching', $model);
    }
    protected function searchView(){
        $adsModel = new ad();
        $homeModel = new home();
        $model = [
            "Advertisements" => $homeModel->searchView($_POST['name'],$_POST['SavedCategories'],$_POST['SavedSubCategories'],$_POST['localization']),
            "categories"=>$adsModel->GetSelectedCategories($_POST['SavedCategories']),
            "subcategories"=>$adsModel->GetSelectedSubCategories($_POST['SavedSubCategories']) 
        ];
        $this->returnView('searching', $model);
    }
}
?>
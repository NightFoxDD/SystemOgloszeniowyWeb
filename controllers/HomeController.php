<?php
class HomeController extends Controller{ 
    protected function getName() {
        
        return 'home';
    }
    protected function Index(){
        
        $homeModel = new Home();
        $model = [
            "lastAds"=>$homeModel->getLastAdsArray(),
        ];
        $this->returnView('index',$model);
    }
    public function test(){
        $this->returnView('home');
    }
}
?>
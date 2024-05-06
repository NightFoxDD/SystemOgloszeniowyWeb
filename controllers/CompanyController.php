<?php
    class CompanyController extends Controller{
        protected function getName() {
            return 'company';
        }
        protected function Index(){
            $this->returnView('index');
        } 
    } 
?>
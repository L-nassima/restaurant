<?php
class ClearController{
    public function httpGetMethod(Http $http, array $queryFields){
      
        $model = new PanierModel();
        $clear = $model->clear();
        $http->redirectTo('/commande');
    }
    public function httpPostMethod(Http $http, array $formFields){
        
    }
}
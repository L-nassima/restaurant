<?php
class BonCommandeController {
	public function httpGetMethod(Http $http, array $queryFields){

		  	$model = new MealModel();
		  	$result=$model->getMealList();
    		$panierModel = new PanierModel();

		  $panier = $panierModel->get();
		  return [

		  	'meal' =>$result,
		  	'paniers' =>$panier,
		  ]; 
      }


    
    public function httpPostMethod(Http $http, array $formFields){

	}
}
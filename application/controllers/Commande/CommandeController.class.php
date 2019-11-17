<?php
class CommandeController {
	public function httpGetMethod(Http $http, array $queryFields){

		$model = new MealModel();
		$result=$model->getMealList();

    	$panierModel = new PanierModel();
		$panier = $panierModel->get();
		  return [

		  	'meals' =>$result,
		  	'paniers' =>$panier,
		  ]; 
    }


    
    public function httpPostMethod(Http $http, array $formFields){

    	$itemToAdd = $formFields;
    	$itemQtt = $formFields;
    	$panierModel = new PanierModel();

    	
        $panier = $panierModel->add(id, itemQtt);
        $http->redirectTo('/Commande');
	}
}
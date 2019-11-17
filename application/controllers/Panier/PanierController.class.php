<?php 

class PanierController {
	public function httpGetMethod(Http $http, array $queryFields){

	}


	public function httpPostMethod(Http $http, array $formFields){


	    $id=$formFields['mealId'];
		$amount=$formFields['amount'];
        $model=new PanierModel('article');
        $mm=new MealModel();

        $result=$mm->getMealById($id) ;

        $valeur = array(
            'name'=>$result['Name'],
            'price'=>$result['SalePrice'],
            'amount'=>$amount,
            'id'=>$id
        );
        $model->add($id,$valeur);
        $http->redirectTo('/Commande');
        
    }
}
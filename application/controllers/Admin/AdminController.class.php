<?php
class AdminController {
	public function httpGetMethod(Http $http, array $queryFields){
        $mealModel = new MealModel();
        $data = $mealModel->getMealList();

            return [
                
                'nameMeal' => $data
            ];
    }

    
    public function httpPostMethod(Http $http, array $formFields){
        
        $name = $formFields['nameMeal'];
        $photo = $formFields['fichier'];
        $description = $formFields['description'];
        $QuantityInStock = $formFields['QuantityInStock'];
        $buyPrice = $formFields['buyPrice'];
        $salePrice = $formFields['salePrice'];

        $meal = new MealModel();
        $result = $meal->addNewMeal($name, $photo, $description, $QuantityInStock, $buyPrice, $salePrice);

        


        $mealModel = new MealModel();
        $data = $mealModel->getMealList();

        return [
            'nameMeal' => $data
        ];     
        
    }	
    
}

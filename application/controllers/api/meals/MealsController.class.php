<?php
class MealsController {
		public function httpGetMethod(Http $http, array $queryFields){
			$mealModel = new MealModel();
			$meal = $mealModel->getMealById($queryFields['id']);

			return [
				'_raw_template' => true,
				'meal' => $meal
			];
    }


   
    
    public function httpPostMethod(Http $http, array $formFields){
	}
}
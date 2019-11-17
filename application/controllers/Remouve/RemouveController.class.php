<?php 

class RemouveController {
	public function httpGetMethod(Http $http, array $queryFields){

	}


	public function httpPostMethod(Http $http, array $formFields){

		$remouve = $formFields['selectMeal'];
		$model = new MealModel;
		foreach($remouve as $mn) {
			$model->remouveMealName($mn);
		}
		
		$http->redirectTo('/Admin');
	}
}
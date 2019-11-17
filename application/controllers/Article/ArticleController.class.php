<?php
class ArticleController {
	public function httpGetMethod(Http $http, array $queryFields){

		$model = new MealModel();
        $results = $model->getMealList();

        return [
            'meals' => $results
        ];
    }


    public function httpPostMethod(Http $http, array $formFields){
	}
}
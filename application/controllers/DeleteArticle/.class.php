<?php
	class DeleteArticleController{
		public function httpGetMethod(Http $http, array $queryFields){

		$model = new PanierModel();
		$id=$formFields['mealId'];
		$delet = $model->delet($id);
		$http->redirectTo('/commander');

	}

	 public function httpPostMethod(Http $http, array $formFields){
        
    }
}
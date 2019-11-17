<?php
	class DeleteArticleController{
		public function httpGetMethod(Http $http, array $queryFields){

		$model = new PanierModel();
		$id=$queryFields['mealId'];
		$delet = $model->delete($id);
		$http->redirectTo('/Commande');

	}

	 public function httpPostMethod(Http $http, array $formFields){
        
    }
}
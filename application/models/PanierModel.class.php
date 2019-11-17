<?php 

class PanierModel {

	public function __construct() {
			if(!isset($_SESSION['panier'])) {
				$_SESSION['panier']= array();
			}
	}
		public function add($key, $value){
        	$_SESSION ['panier'][$key] = $value;
    	}

		public function get() {
			if(isset($_SESSION['panier'])){
				return $_SESSION['panier'];
				return null;
			}
		}

		public function delete($key){
			if(isset($_SESSION['panier'][$key])){
				unset($_SESSION['panier'][$key]);
			}
		}
		
		public function clear() {
			unset($_SESSION['panier']);
		}		
}
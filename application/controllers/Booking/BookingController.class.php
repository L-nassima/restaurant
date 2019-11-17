<?php 
	class BookingController {
		public function httpGetMethod(Http $http, array $queryFields){


    }
    
    public function httpPostMethod(Http $http, array $formFields){

    	
    	$userId = $_SESSION['user'];
    	$model = new BookingModel();
    	$booking = $model->addBooking(
    		$formFields['bookingYear'].'-'.
            $formFields['bookingMonth'].'-'.
			$formFields['bookingDay'],
		    $formFields['bookingHour'].':'.
            $formFields['bookingMinute'],
            $userId,
			$formFields['numberOfSeats']
		);
        
    	$http->redirectTo('/');

	}
}
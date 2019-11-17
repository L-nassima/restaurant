<?php 
	class BookingModel{
		private $bd;

		function __construct() {
			$this->db = new Database;
		}
		
		function addBooking($bookingDate, $bookingTime, $numberOfSeats, $user_id) {
			$this->db->executeSql('INSERT INTO booking(BookingDate, BookingTime, NumberOfSeats, User_Id, CreationTimestamp) VALUES(?, ?, ?, ?, NOW()', [$bookingDate, $bookingTime, $numberOfSeats, $user_id]);

		}
	}
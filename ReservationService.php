<?php

require_once("Flight.php");
require_once("FlightRepository.php");

class ReservationService {

  public function __construct($flight_repository) {
    $this->flight_repository = $flight_repository;
  }

  public function makeReservation($flight_identifier, $number_tickets_wanted) {
    $flight = $this->flight_repository->findFlightByIdentifier($flight_identifier);

    $price = $flight->makeReservation($number_tickets_wanted);

    $this->flight_repository->updateFlight($flight_identifier, $flight);

    return $price;
  }
}

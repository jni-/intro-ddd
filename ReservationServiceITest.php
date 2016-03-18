<?php

require_once('ReservationService.php');

# Only the test knows this implementation for now
require_once('InMemoryFlightRepository.php');

class ReservationServiceITest extends PHPUnit_Framework_TestCase {

  const FLIGHT_IDENTIFIER = "JZ820";
  const FLIGHT_LENGTH_KM = 5000;

  public function setUp() {
    $this->flight = new Flight(self::FLIGHT_LENGTH_KM);
    $this->flight_repository = new InMemoryFlightRepository();
    $this->flight_repository->addFlight(self::FLIGHT_IDENTIFIER, $this->flight);

    $this->ReservationService = new ReservationService($this->flight_repository);
  }

  public function test_priceIsTenCentsPerKm() {
    $number_tickets_wanted = 2;
    $expected_price = 1000;

    $price = $this->ReservationService->makeReservation(self::FLIGHT_IDENTIFIER, $number_tickets_wanted);

    $this->assertEquals($expected_price, $price);

  }
}

<?php

require_once("Flight.php");

class FlightTest extends PHPUnit_Framework_TestCase {

  const FLIGHT_LENGTH_KM = 2000;

  public function setUp() {
    $this->flight = new Flight(self::FLIGHT_LENGTH_KM);
  }

  public function test_priceIsTenCentsPerKmPerTicket() {
    $number_tickets_wanted = 2;
    $expected_price = 400;

    $price = $this->flight->makeReservation(2);

    $this->assertEquals($expected_price, $price);
  }
}

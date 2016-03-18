<?php

require_once("ReservationService.php");

class ReservationServiceTest extends PHPUnit_Framework_TestCase {

  const FLIGHT_IDENTIFIER = "P3360";
  const NUMBER_OF_TICKETS = 2;

  public function setUp() {
    $this->flight_repository = $this->getMockBuilder('FlightRepository')->getMock();
    $this->flight = $this->getMockBuilder("Flight")->disableOriginalCOnstructor()->getMock();
    $this->flight_repository
      ->method("findFlightByIdentifier")
      ->with($this->equalTo(self::FLIGHT_IDENTIFIER))
      ->willReturn($this->flight);

    $this->reservationService = new ReservationService($this->flight_repository);
  }

  public function test_makeReservationFindsFlightById() {
    $this->flight_repository
      ->expects($this->once())
      ->method("findFlightByIdentifier")
      ->with($this->equalTo(self::FLIGHT_IDENTIFIER));

    $this->reservationService->makeReservation(self::FLIGHT_IDENTIFIER, self::NUMBER_OF_TICKETS);
  }

  public function test_makeReservationReturnFlightPrice() {
    $expected_price = 325;
    $this->flight
      ->method("makeReservation")
      ->with($this->equalTo(self::NUMBER_OF_TICKETS))
      ->willReturn($expected_price);

    $price = $this->reservationService->makeReservation(self::FLIGHT_IDENTIFIER, self::NUMBER_OF_TICKETS);

    $this->assertEquals($expected_price, $price);
  }

  public function test_makeReservationPersistsTheFlight() {
    $this->flight_repository
      ->expects($this->once())
      ->method("updateFlight")
      ->with(self::FLIGHT_IDENTIFIER, $this->flight);

    $this->reservationService->makeReservation(self::FLIGHT_IDENTIFIER, self::NUMBER_OF_TICKETS);
  }
}

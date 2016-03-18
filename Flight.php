<?php

class Flight {

  const PRICE_PER_KM = 0.1;

  public function __construct($flight_length) {
    $this->flight_length = $flight_length;
  }

  public function makeReservation($number_tickets_wanted) {
    return $this->flight_length * $number_tickets_wanted * self::PRICE_PER_KM;
  }
}

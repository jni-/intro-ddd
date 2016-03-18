<?php

# For tests only
class InMemoryFlightRepository implements FlightRepository {

  public function __construct() {
    $this->flights = array();
  }

  public function findFlightByIdentifier($flight_identifier) {
    return $this->flights[$flight_identifier];
  }

  public function addFlight($flight_identifier, $flight) {
    $this->updateFlight($flight_identifier, $flight);
  }

  public function updateFlight($flight_identifier, $flight) {
    $this->flights[$flight_identifier] = $flight;
  }
}

<?php

interface FlightRepository {
  public function findFlightByIdentifier($identifier);
  public function updateFlight($flight_identifier, $flight);
}

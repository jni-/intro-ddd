# Stories

For simplicity sakes, assume that an application service is the point of entry. It must have the following signature : 

```php
new ReservationService()->makeReservation($flight_number, $number_of_wanted_tickets);
```

## Story 1 : basic price

When making a reservation, I get the total price for the reservation. The price is 10¢ per km flown per ticket.

Exercise : What is our ubiquitous language so far?

## Story 2 : occupying seats

When making a reservation, the seats become unavailable and can no longer be booked.

All flights must keep 10% of their seats available at all time.

Seat numbers are also given to the customer, along with the price.

Exercice: What is our ubiquitous language now?

## Story 3 : calculating price by aircraft type

The price of 10¢ per km is the baseline. Each aircraft has a specific price modifier.

Airbus has a 50$ surcharge.
Boeing has a 10% surcharge.

Exercice: What is our ubiquitous language now?

## Story 4 : rebate for last minute flights

If buying within 5 days of departure, a 10% rebate is applied.

Also, the 10% rule no longer applies if within 5 days of departure.

Exercice: What is our ubiquitous language now?

## Story 5 : flights during holidays double in price

If the flight covers the holiday season (dec 20th to jan 3rd, mars 1st to 5th, september 1st), its price is doubled.

Exercice: What new kind of object do we now have?

## Story 6 : Calculate fuel needs for a flight

Fuel need is 10 gallons per 500 pounds. Assume average passenger to weight 200 pounds (human + luggage).

Airbus weights 4000 pounds.
Boeing weights 8000 pounds.

Exercice: think first. Is this the same bounded context?

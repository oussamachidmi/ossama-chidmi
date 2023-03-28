 select surname,customer.name,concat(concat(country,', '),city) as destination, hotel.name as hotel from customer ,destination,hotel where customer.top_destination=destination.acronym and destination.hotel_id=hotel.id order by surname,customer.name,destination,hotel;


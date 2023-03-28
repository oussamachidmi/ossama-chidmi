select destination_acronym as destination , customer_surname as customer ,travelers ,end_date::date - start_date::date as number_of_days from booking order by number_of_days desc , destination ,customer;


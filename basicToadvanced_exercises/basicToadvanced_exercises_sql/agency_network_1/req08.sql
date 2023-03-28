select customer_surname as "best customers" ,count( destination_acronym )  as "number of travels" from booking group by customer_surname  order by "number of travels" desc limit 3 ;

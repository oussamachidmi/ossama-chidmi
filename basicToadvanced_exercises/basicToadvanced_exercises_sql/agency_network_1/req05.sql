select regexp_replace(country,'[^a-zA-Z]','', 'g') as country  ,regexp_replace(city,'[^a-zA-Z]','', 'g')  as city  from destination order by country ,city ;


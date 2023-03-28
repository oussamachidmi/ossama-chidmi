select count( distinct city) as count , country from destination group by country order by count DESC , country;


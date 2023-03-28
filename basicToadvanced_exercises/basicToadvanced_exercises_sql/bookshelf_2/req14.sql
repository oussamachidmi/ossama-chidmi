 SELECT NAME ,
    case 
    when death_date is not NULL
        then  DEATH_DATE::DATE - BIRTH_DATE::DATE
    when death_date is NULL 
        then '2000-01-01'::DATE - BIRTH_DATE::DATE
    end as days
    FROM AUTHORS where ('2000-01-01'::DATE - BIRTH_DATE::DATE > 0) ORDER BY NAME;


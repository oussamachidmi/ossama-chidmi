 select title , author , release from books  where ('1900-01-01'::date-release::date >0) or ('1999-12-30'::date-release::date <0 )  order by release desc ,title ,author;


select title , author , extract('year' from release) as release_year from books  order by release desc ,title ,author;


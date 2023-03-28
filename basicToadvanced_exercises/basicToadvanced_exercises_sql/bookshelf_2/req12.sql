select title , name from authors , books where books.author=name and death_date < release order by title,name;


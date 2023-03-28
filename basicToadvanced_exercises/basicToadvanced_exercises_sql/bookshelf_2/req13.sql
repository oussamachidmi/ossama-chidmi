 select distinct title ,author from books , (select  author au , min(release) from books group by au) a where books.release=a.min order by title,author ;

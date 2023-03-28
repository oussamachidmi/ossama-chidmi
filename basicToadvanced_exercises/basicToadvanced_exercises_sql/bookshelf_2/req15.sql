select author as name  ,
case when count(title) >1 
    then concat(count(title), ' books') 
    else concat(count(title),' book') end as stocks 
    from books group by name order by name ;

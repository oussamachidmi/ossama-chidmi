delete from album where length(name) - length(replace(name,'P','')) = 2 ;
delete from album where name like '%mm%';
delete from album where mod(length(name),7)=0 ;
delete from album where name like '%n%' or name like '&';

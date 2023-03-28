select 
case 
    when length(acronym) >3 then acronym
    else overlay(acronym placing '0' from 3 for 0)
        end as acronym from destination order by acronym;

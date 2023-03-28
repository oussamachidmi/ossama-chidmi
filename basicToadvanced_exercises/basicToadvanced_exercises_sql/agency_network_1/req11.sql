select id , case when CURRENT_DATE between start_date::date and end_date::date  then 'Ongoing' when  CURRENT_DATE  < start_date::date then 'Booked' when end_date is not null then 'Done' end as "trip status" from booking order by "trip status" , id; 


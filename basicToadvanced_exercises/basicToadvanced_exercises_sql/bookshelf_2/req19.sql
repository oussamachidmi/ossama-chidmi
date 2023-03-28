CREATE FUNCTION add_book(title VARCHAR(64),
                         author VARCHAR(64),
                         genre VARCHAR(64),
                         release_date DATE)
RETURNS BOOLEAN
      language plpgsql
  as
$$
declare 
    s date;
begin
    select birth_date into s from authors a where a.name=author;
    if release_date::date - s::date > 0 then 
    insert into books(title , author , genre , release) values (title,author,genre,release_date);
    return true;
    else
        return false;
    end if;
    EXCEPTION
        WHEN check_violation THEN 
            return false;
  end;
$$


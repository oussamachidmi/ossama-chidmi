CREATE FUNCTION add_author(name VARCHAR(64), birth_date DATE , death_date DATE , country VARCHAR(64))


RETURNS BOOLEAN
as
$$
begin
      insert into authors  (name , birth_date , death_date , country) values (name,birth_date    ,death_date,country);

    return true;
EXCEPTION 
    WHEN OTHERS
        THEN
        RETURN false;

end;
$$ LANGUAGE 'plpgsql';


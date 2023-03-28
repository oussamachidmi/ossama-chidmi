create FUNCTION duration_to_string(duration INT)
RETURNS VARCHAR(16)
language plpgsql 
as 
$$
declare
min integer;
sec integer;
st VARCHAR(16);
begin

    min=duration/60;
    sec=mod(duration,60);
    st=concat(concat(min,':'),sec);
    return st;
end;
$$;

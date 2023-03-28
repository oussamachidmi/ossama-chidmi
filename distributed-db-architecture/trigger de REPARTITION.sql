-----------------------------REPARTITION "trigger DELETE_compte"-------------------------
create or replace trigger DELETE_compte 
before delete on comptes 
for each row 
begin 
 declare 
 V clients.villeclient%type;  
 OS comptes.solde%type:=:old.solde; 
 n integer;
 table_Mutante exception; 
 pragma exception_init(table_mutante, -4091) ;
 begin 
  select villeclient into V from clients where nclient=:old.nclient;
  if(V='Casablanca') then 
    if(OS<0) then 
      delete BDDBANK1.Comptes1 where idcompte=:old.idcompte; 
      select count(idcompte) into n from BDDBANK1.Comptes1 where nclient=:old.nclient; 
      if(n=0) then 
         delete BDDBANK1.Clients1 where idclient=:old.idclient; 
      end if; 
    end if; 
   elsif(V='Rabat') then
     if(OS>=0) then 
       delete BDDBANK2.Comptes2 where idcompte=:old.idcompte; 
       select count(idcompte) into n from BDDBANK2.Comptes2 where nclient=:old.nclient; 
       if(n=0) then 
       delete BDDBANK2.Clients2 where nclient=:old.nclient; 
       end if; 
     end if; 
    end if;
exception 
when table_mutante then
DBMS_OUTPUT.PUT_LINE('erreur non pertinante') ;
end;
end;

-----------------------------REPARTITION "trigger DELETE_Client"-------------------------

create or replace trigger DELETE_Client 
before delete on clients 
for each row begin declare 

OV clients.villeclient%type:=:old.villeclient;
n1 integer;
n2 integer;
begin
  if(OV='Casablanca') then 
   select count(idcompte) into n1 from BDDBANK1.Comptes1 where nclient=:old.nclient;
   if(n1>0) then 
   delete Bddbank1.clients1 where nclient=:old.nclient;
   end if;
  elsif(OV='Rabat') then 
   select count(idcompte) into n2 from BDDBANK2.Comptes2 where nclient=:old.nclient;
   if(n2>0) then 
   delete Bddbank2.clients2 where nclient=:old.nclient;
   end if;
  end if;
end;
end;
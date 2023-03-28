----------------------fragment "rabat"-------------------

create table comptes2 as ( select comptes.* from BDDBANK.comptes,bddbank.clients
where BDDBANK.comptes.nclient=BDDBANK.clients.nclient
and villeclient='Rabat' and solde>=0);

create table clients2 as ( select DISTINCT clients.* from comptes2,bddbank.clients
where comptes2.nclient=bddbank.clients.nclient);





ALTER table clients2 add CONSTRAINT p1 PRIMARY KEY(nclient); 
ALTER table comptes2 add CONSTRAINT p2 PRIMARY KEY(idcompte); 
 
ALTER table comptes2 add CONSTRAINT f1 FOREIGN KEY(nclient)
REFERENCES clients2(nclient) on DELETE CASCADE;

--------------------fragment "casa"------------------------
create table comptes1 as ( select comptes.* from BDDBANK.comptes,bddbank.clients
where BDDBANK.comptes.nclient=BDDBANK.clients.nclient
and villeclient='Casablanca' and solde<0);

create table clients1 as ( select DISTINCT clients.* from comptes1,bddbank.clients
where comptes1.nclient=bddbank.clients.nclient);





ALTER table clients1 add CONSTRAINT p1 PRIMARY KEY(nclient); 
ALTER table comptes1 add CONSTRAINT p2 PRIMARY KEY(idcompte); 
 
ALTER table comptes1 add CONSTRAINT f1 FOREIGN KEY(nclient)
REFERENCES clients1(nclient) on DELETE CASCADE;

-------------------------duplication de site1 dans site2 et les contraintes ---------------------
create table comptes1 as (select * from bddbank1.comptes1);
create table clients1 as (select * from bddbank1.clients1);


ALTER table clients1 add CONSTRAINT p1_2 PRIMARY KEY(nclient); 
ALTER table comptes1 add CONSTRAINT p2_2 PRIMARY KEY(idcompte); 
 
ALTER table comptes1 add CONSTRAINT f1_2 FOREIGN KEY(nclient)
REFERENCES clients1(nclient) on DELETE CASCADE;

-------------------------"trigger DUP_Clients "------------------------

create or replace trigger DUP_Clients 
before insert or update or DELETE on clients1
for EACH row
begin 
  begin
  if inserting then 
  insert into bddbank2.clients1 VALUES(:new.nclient, :new.nomclient, :new.prenom, :new.adresseclient, :new.villeclient, :new.age);
  elsif updating then 
  update  bddbank2.clients1 set villeclient=:new.villeclient 
  where nclient=:new.nclient ;
  ELSIF deleting then
  DELETE bddbank2.clients1 where nclient=:old.nclient;
  end if;
end;
end;
-----------------------------"trigger DUP_Comptes "----------------------------

create or replace trigger DUP_Comptes 
before insert or update or DELETE on comptes1
for EACH row
begin 
  begin
  if inserting then 
  insert into bddbank2.comptes1 VALUES(:new.idcompte, :new.ncompte, :new.solde, :new.nclient, :new.codeagence);
  elsif updating then 
  update  bddbank2.comptes1 set solde=:new.solde 
  where idcompte=:new.idcompte;
  ELSIF deleting then
  DELETE bddbank2.comptes1 where idcompte=:old.idcompte;
  end if;
end;
end;
------------------------------REPARTITION "TRIGGER UPDATE_Client"-----------------------------------------

create or replace trigger UPDATE_Client 
before update on clients
for each row
begin 
  declare 
   NV clients.villeclient%type:=:new.villeclient; 
   OV clients.villeclient%type:=:old.villeclient;  
   n1 integer;
   n2 integer; 
   R comptes%rowtype;
   cursor cur1 is (select * from comptes where nclient=:new.nclient AND solde>=0);
   cursor cur2 is (select * from comptes where nclient=:new.nclient AND solde<0);

   begin 
   select count(idcompte) into n1 from comptes where nclient=:new.nclient AND solde<0;
   select count(idcompte) into n2 from comptes where nclient=:new.nclient AND solde>=0;
   if(OV='Casablanca') then
     if(NV='Casablanca') then
       if (n1>0) then
          update BDDbank1.clients1 set villeclient=:New.villeclient, AGE=:New.AGE where nclient=:new.nclient;
       end if;
       if (n2>0) then
          delete BDDbank1.clients1 where nclient=:new.nclient;
       end if;
     else 
       if (n1>0) then
           delete BDDbank1.clients1 where nclient=:new.nclient;
       end if;
       if (n2>0) then
           insert into BDDbank2.clients2 values (:new.nclient, :new.nomclient, :new.prenom, :new.adresseclient, :New.villeclient, :New.Age);
           for n in cur1 loop 
           R:=n; 
           insert into BDDbank2.comptes2 values R; 
           end loop;
        end if;
      end if;
   elsif(OV='Rabat') then
     if(NV='Rabat') then
       if (n2>0) then
          update BDDbank2.clients2 set villeclient=:New.villeclient, AGE=:New.AGE where nclient=:new.nclient;
       end if;
       if (n1>0) then
          delete BDDbank2.clients2 where nclient=:new.nclient;
       end if;
     else 
       if (n2>0) then
           delete BDDbank2.clients2 where nclient=:new.nclient;
       end if;
       if (n1>0) then
           insert into BDDbank1.clients1 values (:new.nclient, :new.nomclient, :new.prenom, :new.adresseclient, :New.villeclient, :New.Age);
           for n in cur2 loop 
           R:=n; 
           insert into BDDbank1.comptes1 values R; 
           end loop;
        end if;
       end if;
    elsif(NV='Casablanca') then 
        if n1>0 then 
          insert into BDDbank1.clients1 values (:new.nclient, :new.nomclient, :new.prenom, :new.adresseclient, :New.villeclient, :New.Age);
          for n in cur2 loop 
           R:=n; 
           insert into BDDbank1.comptes1 values R; 
           end loop; 
         end if;  
    elsif(NV='Rabat') then 
        if n2>0 then 
          insert into BDDbank2.clients2 values (:new.nclient, :new.nomclient, :new.prenom, :new.adresseclient, :New.villeclient, :New.Age);
          for n in cur1 loop 
           R:=n; 
           insert into BDDbank2.comptes2 values R; 
           end loop; 
         end if; 
     end if;
end;
end;

--------------------------------REPARTITION "TRIGGER INSERT_COMPTE"--------------------------

create or replace TRIGGER INSERT_COMPTE
before insert on comptes 
for each row
begin
  declare 
  R clients%rowtype;
  V clients.villeclient%type;
  S comptes.solde%type:=:new.solde;
  nb number;
  begin 
  select villeclient into V from clients where nclient =:new.nclient;
  if(V='Casablanca' and S<0) then 
    select count(idcompte) into nb from BDDBANK1.comptes1
    where nclient=:new.nclient;
    if (nb=0) then 
     select * into R from clients where nclient=:new.nclient;
     insert into bddbank1.clients1 VALUES R;

    end if;
    insert INTO BDDBANK2.comptes2 values (:new.idcompte, :new.ncompte, :new.solde, :new.nclient, :new.codeagence);
  elsif (V='Rabat' and S>=0) then 
    select count(idcompte) into nb from BDDBANK2.comptes2
    where nclient=:new.nclient;
    if (nb=0) then 
    select * into R from clients where nclient=:new.nclient;
     insert into bddbank2.clients2 VALUES R;
    end if;
    insert INTO BDDBANK2.comptes2 values (:new.idcompte, :new.ncompte, :new.solde, :new.nclient, :new.codeagence);
  end if;
end;
end;

--------------------------------REPARTITION "UPDATE_Compte "-------------------------
create or replace trigger UPDATE_Compte 
before update on comptes 
for each row 
begin 
 declare

 OS comptes.Solde%type:=:old.Solde; 
 NS comptes.Solde%type:=:new.Solde; 
 V clients.villeclient%type; 
 R clients%rowtype;
 n number;

 begin
 select villeclient into V from clients where nclient=:new.nclient;
 if(V='Casablanca') then
    if(OS<0) then 
      if(NS<0) then 
         update BDDBANK1.Comptes1 set Solde=NS; 
      else 
         delete BDDBANK1.Comptes1 where idcompte=:new.idcompte; 
         select count(idcompte) into n from BDDBANK1.Comptes1 
         where nclient=:new.nclient;
         if(n=0) then 
            delete BDDBANK1.Clients1 where nclient=:new.nclient; 
         end if;    
    end if;
    end if;
 elsif(V='Rabat') then
    if(OS>=0) then 
      if(NS>=0) then 
         update BDDBANK2.Comptes2 set Solde=NS; 
      else 
         delete BDDBANK2.Comptes2 where idcompte=:new.idcompte; 
         select count(idcompte) into n from BDDBANK2.Comptes2 
         where nclient=:new.nclient;
         if(n=0) then 
            delete BDDBANK2.Clients2 where nclient=:new.nclient; 
         end if;    
    end if;
    end if;
    end if;
end;
end;

create or replace trigger UPDATE_Compte 
before update on comptes 
for each row 
begin 
 declare

 OS comptes.Solde%type:=:old.Solde; 
 NS comptes.Solde%type:=:new.Solde; 
 V clients.villeclient%type; 
 R clients%rowtype;
 n integer;
 n1 integer;
 n2 integer;
 n3 integer;

 begin
 select villeclient into V from clients where nclient=:new.nclient;
 if(V='Casablanca') then
    if(OS<0) then 
      if(NS<0) then 
         update BDDBANK1.Comptes1 set Solde=NS where idcompte=:new.idcompte; 
      else 
         delete BDDBANK1.Comptes1 where idcompte=:new.idcompte; 
         select count(idcompte) into n from BDDBANK1.Comptes1 
         where nclient=:new.nclient;
         if(n=0) then 
            delete BDDBANK1.Clients1 where nclient=:new.nclient; 
         end if;    
     end if;
    elsif(OS>=0) then
       if(NS<0) then
          select count(nclient) into n1 from BDDBANK1.Clients1 where nclient=:new.nclient;
          if(n1=0) then 
          select * into R from BDDBANK.Clients where nclient=:new.nclient; 
          insert into BDDBANK1.Clients1 values R ;
          end if;
          insert into BDDBANK1.comptes1 values (:new.idcompte, :new.ncompte, :new.solde, :new.nclient, :new.codeagence);
       end if;
   end if;
 elsif(V='Rabat') then
    if(OS>=0) then 
      if(NS>=0) then 
         update BDDBANK2.Comptes2 set Solde=NS where nclient=:new.nclient;
      else 
         delete BDDBANK2.Comptes2 where idcompte=:new.idcompte; 
         select count(idcompte) into n2 from BDDBANK2.Comptes2 
         where nclient=:new.nclient;
         if(n2=0) then 
            delete BDDBANK2.Clients2 where nclient=:new.nclient; 
         end if;    
      end if;
     elsif(OS<0) then
          if(NS>=0) then
          select count(nclient) into n3 from BDDBANK2.Clients2 where nclient=:new.nclient;
          if(n3=0) then 
          select * into R from BDDBANK.Clients where nclient=:new.nclient; 
          insert into BDDBANK2.Clients2 values R ;
          end if;
           insert into BDDBANK2.comptes2 values (:new.idcompte, :new.ncompte, :new.solde, :new.nclient, :new.codeagence);
          end if;
      end if;
    end if;
end;
end;
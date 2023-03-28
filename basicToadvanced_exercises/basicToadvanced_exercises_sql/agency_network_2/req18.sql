select surname , employee.name ,email from employee,agency where agency.code=employee.agency_code and agency.ratings>6 order by surname,employee.name,email;

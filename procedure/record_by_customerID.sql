use finalassign;
drop procedure if exists record_by_customerID;
 
DELIMITER //  
create procedure record_by_customerID(in cus_id int(11)) 
begin
   select 
   C.customer_id,
   B.bag_id,
   B.names as Name,
   Color,
   Manufacturer,
   Insurance,
   Price, 
   R.DateRent,
   R.DateReturn
   from bags B, customer C, rentals R
   where C.customer_id = cus_id
   and R.customer_id = C.customer_id 
   and B.bag_id = R.bag_id
   and R.ReturnOP = 'rent';
end // 
DELIMITER ;

use finalassign;
drop procedure if exists add_customer;
 
DELIMITER //  
create procedure add_customer(
    in customer_id_ int(11), 
    in first_name_ varchar(15),
    in last_name_ varchar(15), 
    in phone_ varchar(15),
    in creditID_ varchar(15),
    in emailAdd_ varchar(15),
    in regularAdd_ varchar(15)
    ) 
begin
    insert into customer
    (customer_id, first_name, last_name, phone, creditID, emailAdd, regularAdd)
    values
    (customer_id_, first_name_, last_name_, phone_, creditID_, emailAdd_, regularAdd_);
end // 
DELIMITER ;  


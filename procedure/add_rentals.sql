use finalassign;
drop procedure if exists add_rentals;
 
DELIMITER //  
create procedure add_rentals(
    in customer_id varchar(15), 
    in date_rented datetime,
    in date_returned datetime, 
    in insurance tinyint(1),
    in bags_id int(11)
    ) 
begin
    insert into rentals
    (customer_id, DateRent, DateReturn, Insurance, bag_id)
    values
    (customer_id, current_timestamp, date_returned, insurance, bags_id);
end // 
DELIMITER ;  


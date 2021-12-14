use finalassign;
drop procedure if exists best_customer;
 
DELIMITER //  
create procedure best_customer() 
begin
    select 
    last_name as Last_name, 
    first_name as Frist_name,
    regularAdd as Address, 
    phone as Telephone,
    sum(TIMESTAMPDIFF(DAY,DateRent,DateReturn)) as Total_Length_of_Rentals
    from customer C,rentals T
    where C.customer_id = T.customer_id
    group by Last_name, First_name
    order by Total_Length_of_Rentals desc;
end // 
DELIMITER ;  


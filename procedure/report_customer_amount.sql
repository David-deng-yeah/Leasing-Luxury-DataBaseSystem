use finalassign;
drop procedure if exists report_customer_amount;
 
DELIMITER //  
create procedure report_customer_amount(in customer_id varchar(15)) 
begin
    (select
    last_name as Last_Name,
    first_name as First_Name,
    null as Manufacturer,
    null as Name,
    null as Cost
    from customer C, bags B, rentals T
    where C.customer_id = T.customer_id
    and T.bag_id = B.bag_id
    and C.customer_id = customer_id
    group by First_Name) 

    union 

    (select 
    null,null,
    Manufacturer,
    B.names as Name,
    TIMESTAMPDIFF(DAY,DateRent,DateReturn)*(B.Price) as Cost
    from customer C, bags B, rentals T
    where C.customer_id = T.customer_id
    and T.bag_id = B.bag_id
    and C.customer_id = customer_id
    order by Cost desc limit 1000000) 

    union 

    (select null,null,null,null,
    sum(TIMESTAMPDIFF(DAY,DateRent,DateReturn)*(B.Price))
    from customer C, bags B, rentals T
    where C.customer_id = T.customer_id
    and T.bag_id = B.bag_id
    and C.customer_id = customer_id) ;

end // 
DELIMITER ;

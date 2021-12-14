use finalassign;
drop procedure if exists add_bags;
 
DELIMITER //  
create procedure add_bags(
    in bags_id int(11), 
    in bag_name varchar(15), 
    in color varchar(15), 
    in manufacturer varchar(15), 
    in price float,
    in num_ int
    ) 
begin
    DECLARE num INT;
    select count(*) into num from bags where bag_id = bags_id;
    if num = 0 then
        insert into bags
        (bag_id, names, Color, Manufacturer, Price, nums)
        values
        (bags_id, bag_name, color, manufacturer, price, num_);
    else 
        update bags set nums = nums +num_ where bag_id = bags_id;
    end if;
    
end // 
DELIMITER ;  


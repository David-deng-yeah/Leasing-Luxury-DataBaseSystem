use finalassign;
drop procedure if exists show_customer;

delimiter //
create procedure show_customer()
begin
    select * from customer;
end //
delimiter ;
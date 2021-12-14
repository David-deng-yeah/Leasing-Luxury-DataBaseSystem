use finalassign;
drop procedure if exists show_rentals;

delimiter //
create procedure show_rentals()
begin
    select * from rentals;
end //
delimiter ;
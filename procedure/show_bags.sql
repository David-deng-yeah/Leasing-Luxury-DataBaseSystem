use finalassign;
drop procedure if exists show_bags;

delimiter //
create procedure show_bags()
begin
    select * from bags;
end //
delimiter ;
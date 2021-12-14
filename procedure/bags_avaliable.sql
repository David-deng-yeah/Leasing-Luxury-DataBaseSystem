use finalassign;
drop procedure if exists bags_avaliable;
 
DELIMITER //  
create procedure bags_avaliable() 
begin
   select * from bags where nums > 0;
end // 
DELIMITER ;

use finalassign;
drop procedure if exists bags_for_manufacturer;
 
DELIMITER //  -- 定义存储过程结束符号为//
create procedure bags_for_manufacturer(in name varchar(15)) -- 定义输入与输出参数
begin
    select names, Color, Manufacturer
    from bags
    where Manufacturer = name;
end // -- 结束符要加
DELIMITER ;  -- 重新定义存储过程结束符为分号
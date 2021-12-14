use finalassign;
drop trigger if exists trigger_return;

DELIMITER //  
create trigger trigger_return
after insert on rentals for each row
begin
    -- 触发器的类型：1.insert归还记录 2.insert租借记录
    declare types varchar(15);
    -- 获取归还的商品id等属性
    declare id int;

    select bag_id, ReturnOP 
    into id, types
    from rentals
    order by rentals_id desc limit 1;
    -- 根据触发器类型，更新商品数量
    if types = 'rent' then
        update bags
        set nums = nums - 1
        where bag_id = id;
    else 
        update bags
        set nums = nums + 1
        where bag_id = id;
    end if;
    
end //
DELIMITER ;
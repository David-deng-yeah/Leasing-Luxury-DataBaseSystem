use finalassign;
-- 用以在归还商品之后将rent信息改为down表示交易结束
drop trigger if exists rent2down;

DELIMITER //  
create procedure rent2down()
begin
    -- 获取归还的商品id等属性
    declare id int;
    declare cus_id int;
    declare DRent datetime;
    declare DReturn datetime;
    declare Insura tinyint(1);

    select 
    bag_id, customer_id, DateRent, Insurance
    into 
    id, cus_id, DRent, Insura
    from rentals
    where ReturnOP = 'return'
    order by rentals_id desc limit 1;

    -- 更新交易
    update rentals
    set ReturnOP = 'down'
    where bag_id = id 
    and customer_id = cus_id
    and DateRent = DRent
    and Insurance = Insura
    and ReturnOP = 'rent';
end //
DELIMITER ;

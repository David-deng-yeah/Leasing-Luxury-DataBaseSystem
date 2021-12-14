use finalassign;

-- 导入用户数据
insert into customer
(last_name, first_name, phone, creditID, emailAdd, regularAdd)
values
('deng', 'hewen','135-378-49578','000000000000','1348478403@qq.com','shenzhen'),
('Murray', 'Annabelle','404-998-3928','443355463212','belle@comcast.net','59 W. Central Ave'),
('Franco','Gina','404-887-2342','443398764532','gf59@gmail.com','1012 Peachtree St'),
('Quinn','Sally','404-987-3427','443398765439','quinn45@gmail.com','54 Oak Ave'),
('Zern','Joan','404-675-0091','443357643254','zern@comcast.net','58 W. Central Ave'),
('Lopato','Maria','404-234-8876','443352635423','mrl@hotmail.com','5490 West 5th'),
('Smith','Patricia','404-765-3342','443398762534','patti1@gmail.com','1700 E. Lincoln Ave'),
('Pao','Jill','404-887-9238','443367256543','pao@comcast.net','89 Orchard'),
('Berry','Anna','404-887-4673','443376562837','aberry@hotmail.com','9 Pleasant Way');

-- 导入包数据
insert into bags
(bag_id, names, Color, Manufacturer, Price, nums)
values        
(107	,"Messenger"				,"Black"	,"Prada"			,9.50, 1),                          
(102	,"Cabas Piano"				,"Multi"	,"Louis Vuitton"	,8.75, 1),                  
(104	,"Satchel"					,"Camel"	,"Coach"			,9.00, 1),                              
(105	,"Hippie Flap"				,"Green"	,"Coach"			,9.00, 1),                          
(110	,"Haymarket Woven Warrier"	,"Gold"		,"Burberry"			,10.00, 1),       
(106	,"Bleeker Bucket"			,"Blue"		,"Coach"			,9.00, 1),                      
(108	,"Fairy"					,"Multi"	,"Prada"			,9.50, 1),                                                  
(103	,"Monogram Pochette"		,"Multi"	,"Louis Vuitton"	,8.75, 1),          
(109	,"Glove Soft Pebble	"		,"Mauve"	,"Prada"			,9.50, 1),                  
(111	,"Knight"					,"Plaid"	,"Burberry"			,10.00, 1),                                              
(101	,"Claudia"					,"White"	,"Louis Vuitton"	,8.75, 1);                                      
																                     																

-- 导入交易数据
-- ReturnOP 包括 rent、return、down三种状态，其中down表示借了之后换了，即完成交易
insert into rentals
(customer_id, DateRent, DateReturn, Insurance, bag_id, ReturnOP)
VALUES
(2	,"2011-4-12"	,"2011-4-30"	,TRUE  ,101, 'rent'),
(2	,"2011-1-19"	,"2011-2-1"		,TRUE  ,107, 'rent'),
(3	,"2011-2-11"	,"2011-2-19"	,TRUE  ,102, 'rent'),
(3	,"2011-3-9"		,"2011-3-11"	,TRUE  ,104, 'rent'),
(3	,"2011-5-21"	,"2011-5-25"	,TRUE  ,105, 'rent'),
(4	,"2011-3-16"	,"2011-3-17"	,FALSE ,110, 'rent'),
(6	,"2011-5-18"	,"2011-5-25"	,FALSE ,106, 'rent'),
(5	,"2011-1-1"		,"2011-2-1"		,TRUE  ,108, 'rent'),
(5	,"2011-6-2"		,"2011-6-8"		,TRUE  ,101, 'rent'),
(5	,"2011-5-6"		,"2011-5-9"		,TRUE  ,103, 'rent'),
(7	,"2011-6-2"		,"2011-6-30"	,FALSE ,109, 'rent'),
(8	,"2011-2-19"	,"2011-3-1"		,TRUE  ,111, 'rent'),
(8	,"2011-3-30"	,"2011-4-2"		,TRUE  ,111, 'rent'),
(9	,"2011-3-5"		,"2011-3-9"		,FALSE ,101, 'rent'),
(9	,"2011-4-1"		,"2011-4-21"	,FALSE ,103, 'rent'),
(9	,"2011-5-5"		,"2011-5-9"		,FALSE ,106, 'rent');

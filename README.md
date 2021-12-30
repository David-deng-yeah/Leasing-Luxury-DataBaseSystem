this is a repository about the database system final assignment
##  实验环境
PHP == 5.5.12

Mysql == 15.6.17

Operate system == Win 10 professtion

Node.js == 14.17.3


##  数据库架构介绍
![在这里插入图片描述](https://img-blog.csdnimg.cn/cf3c15b21bc54c5788344743f8222c83.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

!
图一为数据库的整体架构，分为前端主页面、后端php、数据库。前端主页面由一个index.html文件组成，分别提供了“展示可借的商品“，”个人已借的商品目录“，”所有数据表的信息“，”其他数据库功能“页面的重定向信息，后端由php编码，负责租借金额计算逻辑、数据库交互等功能；数据库使用mysql，编写了一系列存储过程、触发器与后端进行交互

##  建立数据库
数据库一共建立了三张表
* Bags商品表
* Customer用户信息表
* Rentals交易表
下列为表的字段和主键

```sql
create table bags(  
    bag_id int not null,  
    names varchar(15),  
    Color varchar(15),  
    Manufacturer varchar(15),  
    Price float not null,  
    nums int not null,  
    primary key(bag_id)  
);  

```
![在这里插入图片描述](https://img-blog.csdnimg.cn/d54e47c2af194aab90af1dfd4d9b2bac.png)

```sql
create table customer(  
    customer_id int not null auto_increment,  
    first_name varchar(15),  
    last_name varchar(15),  
    phone varchar(15),  
    creditID varchar(15),  
    emailAdd varchar(15),  
    regularAdd varchar(15),  
    primary key(customer_id),  
    unique(creditID)  
);  

```
![在这里插入图片描述](https://img-blog.csdnimg.cn/7c0b600a0b094183a0359a4046173b7e.png)

```sql
create table rentals(  
    rentals_id int not null auto_increment,  
    customer_id int not null,  
    DateRent Date,  
    DateReturn Date,  
    Insurance boolean,  
    bag_id int not null,  
    ReturnOP varchar(15),  
    foreign key(bag_id) references bags(bag_id),  
    foreign key(customer_id) references customer(customer_id),  
    -- 不会有人同一天借同一个包，所以可以唯一表示一条交易记录  
    primary key(rentals_id,customer_id, DateRent, bag_id),  
    unique(rentals_id, customer_id, DateRent, bag_id)  
);  
```
![在这里插入图片描述](https://img-blog.csdnimg.cn/03c994c7494c4235af38213bcdf108f7.png)

##  租借操作
进入主界面，点击可借商品目录
![在这里插入图片描述](https://img-blog.csdnimg.cn/0c9691e643db486a99401271f04b781e.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)


找到一条记录，进行租借操作
![在这里插入图片描述](https://img-blog.csdnimg.cn/49147949b9a64cb39c5f8d13cdbdd02f.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)


输入用户信息，进行租借
![在这里插入图片描述](https://img-blog.csdnimg.cn/5868d591d96847159b3c09398c48b8b8.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

操作成功，成功租借了商品
![在这里插入图片描述](https://img-blog.csdnimg.cn/b91341c7c4794fb488b1ee3d460dc85d.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

去交易表rentals进行确认
![在这里插入图片描述](https://img-blog.csdnimg.cn/d85f7f9433a543929e696ba05a76a029.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

查看用户的个人已借商品目录进行查看
![在这里插入图片描述](https://img-blog.csdnimg.cn/d4d698ae7bb64174be99cc9e05d59cd0.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

进入页面之后，可以输入用户id进行查询
![在这里插入图片描述](https://img-blog.csdnimg.cn/c2c1144a84dc4be7be182c08d5c5d0dc.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

查询得到结果，此时我们可以发现多了一条租借记录，这表示我们的租借操作成功了
![在这里插入图片描述](https://img-blog.csdnimg.cn/27ed6e40c3ee42628c24e009d796a5ed.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)



##  归还商品操作
我们进入个人已借商品目录，可以发现上面（租借包）的记录已经被添加到了个人目录下，我们可以点击归还按钮进行
![在这里插入图片描述](https://img-blog.csdnimg.cn/57d844d353e44853b1948086277a0e80.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

我们可以发现归还操作成功了，并且归还时还计算了用户应该支付多少钱
计算金额的php逻辑如下

```sql
//计算花费金额  
$DateReturn = strtotime($DateReturn);  
$DateRent = strtotime($DateRent);  
$diffTime = round(($DateReturn-$DateRent)/3600/24);  
$money_toPay = $diffTime*$Price;  
//保险费  
if($Insurance == 1){  
    $money_toPay = $money_toPay + $diffTime;  
}  
  
echo '<script>alert("归还成功,花费'.$money_toPay.'");window.location.href=document.referrer;</script>';

```
![在这里插入图片描述](https://img-blog.csdnimg.cn/67e313e806eb4819833ed4decb29438d.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

归还之后，我们发现用户的个人租借页面上少了一条记录，这说明我们的归还操作成功了
![在这里插入图片描述](https://img-blog.csdnimg.cn/a7a6da7e6e4149138021e71c152097fd.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

归还商品后，我们观察交易表rentals，可以发现新插入了一条return记录，这代表着我们完成了一次归还操作；我们还发现了之前的租借记录的操作类型由rent变为了down，这说明我们的交易有借有还，可以结束了（down）
![在这里插入图片描述](https://img-blog.csdnimg.cn/7fd7474d3d294a0fa90d93c12543b49e.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

我们再去观察商品表bags，可以发现商品的数量恢复为1了

![在这里插入图片描述](https://img-blog.csdnimg.cn/1b0d309a60684c8a9ec924bc274d6fe4.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)



##  功能一 根据制造者姓名查询包的表
首先了我们进入对应的功能区，输入要查询的制造者的姓名，点击查询
![在这里插入图片描述](https://img-blog.csdnimg.cn/4ac52e1e95734af8abc39a92a2a8c6da.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

观察查询结果，可以发现与题目给出的案例相同，我们完成了一次查询

![在这里插入图片描述](https://img-blog.csdnimg.cn/93947552e69c4e0a80d01bc705103de8.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)


##  功能二 查找最佳用户
首先我们进入功能区，点击查询
![在这里插入图片描述](https://img-blog.csdnimg.cn/a44b3709964b418f9967e44e82748cd8.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

可以发现弹出了最佳用户的表，和题目给出的样例相同
![在这里插入图片描述](https://img-blog.csdnimg.cn/0063aaa0ac374a3b8880eb64d65b0d98.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)


##  功能三 计算每个用户的租借记录和花费
首先我们进入功能区，输入用户id，进行查询
![在这里插入图片描述](https://img-blog.csdnimg.cn/1b77579e99f749ceb87f8a4e80dd8126.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

之后经过查询和计算，页面上显示了用户的消费计算，和题目给出的样例相同
![在这里插入图片描述](https://img-blog.csdnimg.cn/e48fc49ffa5847ec9661e492faaa0f23.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)



##  功能四 添加交易记录和添加商品
首先我们进入报表功能区，这里记录了所有的报表，我们点击进入bags表，添加商品
![在这里插入图片描述](https://img-blog.csdnimg.cn/27fc3b5574964ce28dd8e43a4736bdf0.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

我们在空格处输入我们想插入的商品信息，点击插入按钮
![在这里插入图片描述](https://img-blog.csdnimg.cn/0aecd5d4245040128955461cd24bbab3.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

我们可以发现添加商品的操作成功了
![在这里插入图片描述](https://img-blog.csdnimg.cn/6e9f2b513a3b4abfbe58f7166dcf4f05.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

为了验证商品是否添加成功，我们进入商品表页面。
可以发现在表的底部插入了一条数据，这就是我们所添加的商品
![在这里插入图片描述](https://img-blog.csdnimg.cn/9d170a0115c34e29bf825938dd2b4899.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)


##  功能五 归还商品操作
###  归还商品时，计算总的花费金额
下面这部分代码，实现了计算总的花费金额

```sql
//计算花费金额  
$DateReturn = strtotime($DateReturn);  
$DateRent = strtotime($DateRent);  
$diffTime = round(($DateReturn-$DateRent)/3600/24);  
$money_toPay = $diffTime*$Price;  
//保险费  
if($Insurance == 1){  
    $money_toPay = $money_toPay + $diffTime;  
}  
  
echo '<script>alert("归还成功,花费'.$money_toPay.'");window.location.href=document.referrer;</script>';  

```
通过将两个time对象进行相减并进行规整化，我们得到了用户租借的天数，我们将之乘以商品的每天租借所需花费的价格，在根据保险类型添加保险费用，最后便得到了所需的cost，并通过JavaScript弹窗的形式弹出
###  归还商品时，恢复商品数量
这里我是实现了一个触发器trigger，当交易表发生插入时被触发
* 如果sql得到的最新插入的记录为 归还记录，就将对应bag_id的商品数量加一
* 如果sql得到的最新插入的记录为 租借记录，就将对应bag_id的商品数量减一

```sql
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

```

##  功能六 异常检测
###  异常用户id
在输入用户id时，如果输入的是不合法的用户id，就会进行报错
![在这里插入图片描述](https://img-blog.csdnimg.cn/acc0bf93f11e4677b106e5ab33759a91.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

如下图所示，发生了报错，错误被停止
![在这里插入图片描述](https://img-blog.csdnimg.cn/4450aa52690f458b8390fe60402db0d2.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

代码的逻辑

```sql
//异常检测------------------  
$tmp_sql = 'select * from customer where customer_id = "'.$customerID.'"';  
$tmp_res = mysqli_query($conn, $tmp_sql);  
if(mysqli_num_rows($tmp_res)==0){  
    echo '<script>alert("操作失败,不存在的用户id");window.location.href=document.referrer;</script>';  
    die("customerID is uncorrect");  
}  
//异常检测------------------  

```

###  异常日期
在输入异常日期是，通过正则表达式来检验日期是否合法，不合法的输入会产生报错
![在这里插入图片描述](https://img-blog.csdnimg.cn/c532b99062ac4597ba733dc416646f68.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

报错如下图所示
![在这里插入图片描述](https://img-blog.csdnimg.cn/2e85cc52199a43dbaed1748827b38dc4.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)


代码逻辑

```sql
if(! preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$DateReturn)){  
    echo '<script>alert("操作失败，日期不正确");window.location.href=document.referrer;</script>';  
    die("date is uncorrect");  
}  

```

###  异常保险类型
在输入保险类型时，如果输入的是不合法的保险类型，就会进行报错
![在这里插入图片描述](https://img-blog.csdnimg.cn/8bef8d6a7bf44ec9baebfe622f4d40bd.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)

报错如下图所示

![在这里插入图片描述](https://img-blog.csdnimg.cn/dc35d416f2d64ee9bf066b4b7a3d5980.png?x-oss-process=image/watermark,type_d3F5LXplbmhlaQ,shadow_50,text_Q1NETiBATlBfaGFyZA==,size_20,color_FFFFFF,t_70,g_se,x_16#pic_center)


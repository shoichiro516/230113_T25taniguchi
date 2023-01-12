drop database if exists playershop;
create database playershop default character set utf8 collate utf8_general_ci;
drop user if exists 'staff'@'localhost';
create user 'staff'@'localhost' identified by 'password';
grant all on playershop.* to 'staff'@'localhost';
use playershop;

create table product (
	id int auto_increment primary key, 
	name varchar(200) not null, 
	price int not null
);

create table customer (
	id int auto_increment primary key, 
	name varchar(100) not null, 
	address varchar(200) not null, 
	login varchar(100) not null unique, 
	password varchar(100) not null
);

create table purchase (
	id int not null primary key, 
	customer_id int not null, 
	foreign key(customer_id) references customer(id)
);

create table purchase_detail (
	purchase_id int not null, 
	product_id int not null, 
	count int not null, 
	primary key(purchase_id, product_id), 
	foreign key(purchase_id) references purchase(id), 
	foreign key(product_id) references product(id)
);

create table favorite (
	customer_id int not null, 
	product_id int not null, 
	primary key(customer_id, product_id), 
	foreign key(customer_id) references customer(id), 
	foreign key(product_id) references product(id)
);

insert into product values(null, '赤木剛憲', 197);
insert into product values(null, '木暮公延', 178);
insert into product values(null, '安田靖春', 164);
insert into product values(null, '宮城リョータ', 168);
insert into product values(null, '潮崎哲士', 176);
insert into product values(null, '角田悟', 180);
insert into product values(null, '桜木花道', 189);
insert into product values(null, '流川楓', 187);
insert into product values(null, '石井健太郎', 170);
insert into product values(null, '佐々岡智', 171);
insert into product values(null, '桑田登紀', 162);
insert into product values(null, '三井寿', 184);
insert into product values(null, '相田彦一', 167);
insert into product values(null, '八村塁', 203);

insert into customer values(null, '田岡 茂一', '東京都大新宿区西新宿1-1-1', 'taoka', 'taoka1');
insert into customer values(null, '安西 光義', '神奈川県藤沢市湘南北1-1-1', 'anzai', 'anzai1');
insert into customer values(null, '金平 太郎', '大阪府大阪市中央区大手前2-2-2', 'kanehira', 'kanehira1');
insert into customer values(null, '藤真 健司', '神奈川県横須賀市軍艦1000-5', 'hujima', 'hujima1');
insert into customer values(null, '北野 武司', '大阪府豊玉市高砂3-3-3', 'kitano', 'kitano1');
insert into customer values(null, '高頭 力', '神奈川県川崎市幸区561-561', 'takato', 'takato1');
insert into customer values(null, '堂本 五郎', '秋田県山王市中央区下山手通5-5-5', 'domoto', 'domoto1');
insert into customer values(null, '赤木 晴子', '神奈川県藤沢市湘南北555-100', 'akagi', 'akagi1');
insert into customer values(null, '魚住 純', '神奈川県藤沢市湘南南1-1-10', 'uozumi', 'uozumi1');

create table acc(
	id bigint(20) primary key auto_increment,
    acc_number int(11),
    acc_name varchar(10),
    acc_balance int(11),
    created_at timestamp default current_timestamp,
    updated_at timestamp
);
create table trans(
	id bigint(20) primary key auto_increment,
    transaction_from int(11),
    transaction_to int(11),
    transaction_amount int(11),
    transaction_description varchar(50),
    created_at timestamp default current_timestamp,
    updated_at timestamp
);
insert into acc(acc_number,acc_name,acc_balance) values(23423,'ebo',25000);
insert into acc(acc_number,acc_name,acc_balance) values(23562,'baba',2000000);
insert into acc(acc_number,acc_name,acc_balance) values('2444','zaba',12345);
SELECT * FROM acc;
insert into trans(transaction_from,transaction_to,transaction_amount,transaction_description) values(23423,23562,3000,'Surgaltin tulbur');
insert into trans(transaction_from,transaction_to,transaction_amount,transaction_description) values(23562,2444,1500555,'piwo');
select * from trans;
SELECT * FROM trans WHERE transaction_from=2444;
UPDATE acc SET acc_balance=acc_balance+1,updated_at=NOW() WHERE acc_number=2444;

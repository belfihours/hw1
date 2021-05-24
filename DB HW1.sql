Create table Cliente
(ID int not null AUTO_INCREMENT  primary key, nome varchar(20), cognome varchar(20),
 nome_utente varchar(20), password varchar(20)) engine='innoDB';

create table recensione
(stelle int,id_cliente int primary key, data date, testo varchar(255)) engine='innoDB';

insert into Cliente values (null, 'Simone', 'Belfiore', 'belfihours', 'password');
insert into Cliente values (null, 'Carla', 'Vinciguerra', 'carlav', 'password2');

replace into recensione values (5,  1, NOW(), "Posto molto accogliente");
replace into recensione values (3,  2, NOW(), "Sì e no");


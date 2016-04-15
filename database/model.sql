/* base de datos vigencia */
create database vigencia;

/* table user */
create table user
(
  user_id int(11) auto_increment not null,
  user_alias varchar(10),
  user_pass varchar(25)
);

/* table vigen */
create table vigen
(
  vigen_id int(11),
  vigen_tipProd int(11),
  vigen_des varchar(25),
  vigen_seri varchar(50),
  vigen_mar varchar(200),
  vigen_cli varchar(500),
  vigen_fac varchar(25),
  vigen_fechIni date,
  vigen_fechVigen date,
  vigen_tipVigen int(11)
);

/* table tip_vigen
  todos
  vencidos
  por vencer
*/
create table tip_vigen
(
  tip_vigen_id int(11) auto_increment not null primary key,
  tip_vigen_des varchar(50)
);

/* table tip_prod
  todos
  suministros
  accesorios
  servicios
*/
create table tip_prod
(
  tip_prod_id int(11) auto_increment not null primary key,
  tip_
);

/* base de datos vigencia */
create database vigencia;

/* tables */

  /* user */
  create table user
  (
    user_id int(11) auto_increment not null primary key, /* PK */
    user_alias varchar(10),
    user_pass varchar(25)
  );

  /* vigen */
  create table vigen
  (
    vigen_id int(11), /* PK */
    tip_prod_id int(11), /* FK */
    vigen_des varchar(25),
    vigen_seri varchar(50),
    vigen_mar varchar(200),
    vigen_cli varchar(500),
    vigen_fac varchar(25),
    vigen_fechIni date,
    vigen_fechVigen date,
    tip_vigen_id int(11) /* FK */
  );

  /* tip_vigen
    todos
    vencidos
    por vencer
  */
  create table tip_vigen
  (
    tip_vigen_id int(11) auto_increment not null primary key, /* PK */
    tip_vigen_des varchar(50)
  );

  /* tip_prod
    todos
    suministros
    accesorios
    servicios
  */
  create table tip_prod
  (
    tip_prod_id int(11) auto_increment not null primary key, /* PK */
    tip_prod_des varchar(200)
  );

/* restrict */

  alter table vigen
  add constraint tip_prod_id_fk foreign key (tip_prod_id) references tip_prod(tip_prod_id),
  add constraint tip_vigen_id_fk foreign key (tip_vigen_id) references tip_vigen(tip_vigen_id);




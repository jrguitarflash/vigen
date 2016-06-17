/* base de datos vigencia */
create database vigencia;

/* tables */

  /* user -> OK */
  create table user
  (
    user_id int(11) auto_increment not null primary key, /* PK */
    user_alias varchar(10),
    user_pass varchar(25)
  );

  /* vigen -> OK */ 
  create table vigen
  (
    vigen_id int(11), /* PK */
    tip_prod_id int(11), /* FK */
	tip_vigen_id int(11), /* FK */
    vigen_des varchar(25),
    vigen_seri varchar(50),
    vigen_mar varchar(200),
    vigen_cli varchar(500),
    vigen_fac varchar(25),
    vigen_fechIni date,
    vigen_fechVigen date
  );

  /* tip_vigen -> OK
    todos
    vencidos
    por vencer
  */
  create table tip_vigen
  (
    tip_vigen_id int(11) auto_increment not null primary key, /* PK */
    tip_vigen_des varchar(50)
  );

  /* tip_prod -> OK
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
  
  /* vigen alert -> OK */
  
  create table vigen_alert
  (
	vigen_alert_id int(11) auto_increment not null primary key, /* PK */
    vigen_frecu_id int(11), /* FK */
    vigen_est_id int(11),
    vigen_tip_id int(11),
	vigen_anu int(11)
  );
  
  /* vigen desti -> OK */
  
  create table vigen_desti
  (
	vigen_desti_id int(11) auto_increment not null primary key, /* PK */
    vigen_desti_nom varchar(50),
    vigen_desti_email varchar(200)
  );
  
  /* vigen frecu -> OK */
  
  create table vigen_frecu
  (
	vigen_frecu_id int(11) auto_increment not null primary key, /* PK */
    vigen_frecu_des varchar(50)
  );
  

 /* vigen hist mail -> OK */
 
 create table vigen_hist
 (
	vigen_hist_id int(11) primary key not null auto_increment,#PK
    vigen_id int(11), #FK
    vigen_hist_envi int(11),
    vigen_hist_fechEnv date,
    vigen_hist_msg text
 );


 /* vigen rep mail */
 
 create table vigen_rep
 (
	vigen_rep_id int(11) primary key not null auto_increment, #PK
    vigen_alert_id int(11),
    vigen_rep_nom varchar(200),
    vigen_rep_fech date,
    vigen_rep_msg varchar(200),
    vigen_rep_env int(11)
 );

/* restrict */

  alter table vigen
  add constraint tip_prod_id_fk foreign key (tip_prod_id) references tip_prod(tip_prod_id),
  add constraint tip_vigen_id_fk foreign key (tip_vigen_id) references tip_vigen(tip_vigen_id);
  
  alter table vigen_alert
  add constraint vigen_frecu_id_fk foreign key (vigen_frecu_id) references vigen_frecu(vigen_frecu_id);
  
  alter table vigen
  add constraint tip_vigen_id_fk foreign key (tip_vigen_id_fk) references tip_vigen_id(tip_vigen_id);




/* user */

	/* ejecutar procedure */
    call vali_usu('admi','admin');
    
	#insert user
	insert into user(user_alias,user_pass) values ('admin','admin');

/* vigen */

	call obt_vigen(2,2016,0,'');

	/* add contact,email */
    alter table vigen
    add vigen_contac varchar(200) after vigen_fechVigen,
    add vigen_mail varchar(200) after vigen_contac;

	/* borrar foreign key */
	ALTER TABLE `table_name` DROP FOREIGN KEY `id_name_fk`;
	ALTER TABLE `table_name` DROP INDEX  `id_name_fk`;

	alter table vigen drop foreign key tip_vigen_id_fk;
	alter table vigen drop index tip_vigen_id_fk;
    
    /* borrar columna */
	alter table vigen drop tip_vigen_id;
    
	# select vigen
    select * from vigen;
    
	#borrar toda data
    truncate vigen;
    delete from vigen where vigen_id>0;
    
	#obtener vigen
    call obt_vigen(0,0,0,'');
    
	#obt cc vigen
    call obt_ccVig();
    
    /* add cc,proye in vigen */ 
	alter table vigen
    add vigen_cc char(15) after tip_prod_id,
    add vigen_proy varchar(200) after vigen_cc;
    
    /* vigen a pk */
	alter table vigen
	change vigen_id vigen_id int(11) primary key auto_increment;
    
    /* query vigen */
	select 
        *,
        (select tip_prod_des from tip_prod where tip_prod_id=vig.tip_prod_id) as tip_prod,
        datediff(now(),vig.vigen_fechVigen) as dif_fech,
        (select if(dif_fech<0,'por vencer','vencido')) as esta_vigen
        from vigen as vig where vig.vigen_id>0 and vig.vigen_cc='cc-1115';
        
	/* add tip_vigen_id */
    alter table vigen
    add tip_vigen_id int(11) after tip_prod_id;

/* tip_vigen */

	/* borrar table */
	drop table tip_vigen;
    
    #
    call obt_tipVig();

/* tip_prod */

	#insert tip
  	insert into tip_prod(tip_prod_des) values ('accesorios');
    insert into tip_prod(tip_prod_des) values ('suministros');
	insert into tip_prod(tip_prod_des) values ('servicios');
    insert into tip_prod(tip_prod_des) values ('ninguno');
    
	# select tip_prod
	select * from tip_prod;
    
	#obtener tip prod
    call obt_tipProd();

/* vigen alert */

	call obt_ultAler();

/* vigen desti */

/* vigen frecu */

/* others */

	/* convertir fecha */
	SELECT DATE_FORMAT('20/04/2016', "%d/%m/%Y %H:%m:%s") AS 'NAME';


    

    

    

    

    

    
 
    

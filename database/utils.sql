/* borrar foreign key */

	ALTER TABLE `table_name` DROP FOREIGN KEY `id_name_fk`;
	ALTER TABLE `table_name` DROP INDEX  `id_name_fk`;

	alter table vigen drop foreign key tip_vigen_id_fk;
	alter table vigen drop index tip_vigen_id_fk;
    
/* borrar columna */

	alter table vigen drop tip_vigen_id;
    
/* borrar table */

	drop table tip_vigen;
    
/* ejecutar procedure */

    call vali_usu('admi','admin');
    
/* add cc,proye in vigen */ 

	alter table vigen
    add vigen_cc char(15) after tip_prod_id,
    add vigen_proy varchar(200) after vigen_cc;
    
/* convertir fecha */

	SELECT DATE_FORMAT('20/04/2016', "%d/%m/%Y %H:%m:%s") AS 'NAME';
    
/* vigen a pk */
	alter table vigen
	change vigen_id vigen_id int(11) primary key auto_increment;     
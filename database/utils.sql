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
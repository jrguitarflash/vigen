/* INSERT */

	#insert tip

	insert into tip_prod(tip_prod_des) values ('accesorios');
    insert into tip_prod(tip_prod_des) values ('suministros');
	insert into tip_prod(tip_prod_des) values ('servicios');
    
    #insert user
    insert into user(user_alias,user_pass) values ('admin','admin');
    
/* SELECT */    
    
	# select tip_prod

	select * from tip_prod;
    
	# select vigen

    select * from vigen;
    
/* DELETE */

/* UPDATE */

/* PROCEDURE */

	#validar usuario
	DELIMITER $$
	create procedure vali_usu($usu varchar(10),$clav varchar(25))
    COMMENT 'validar usuario'
    BEGIN
		
        select * from user where user_alias=$usu and user_pass=$clav;
    
    end;

/* FUNCTION */    
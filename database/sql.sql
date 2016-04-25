/* INSERT */

	#insert tip

	insert into tip_prod(tip_prod_des) values ('accesorios');
    insert into tip_prod(tip_prod_des) values ('suministros');
	insert into tip_prod(tip_prod_des) values ('servicios');
    insert into tip_prod(tip_prod_des) values ('ninguno');
    
    #insert user
    insert into user(user_alias,user_pass) values ('admin','admin');
    
/* SELECT */    
    
	# select tip_prod

	select * from tip_prod;
    
	# select vigen

    select * from vigen;
    
/* DELETE */

	#borrar toda data
    truncate vigen;
    delete from vigen where vigen_id>0;

/* UPDATE */

/* CALL */
	
    #obtener vigen
    call obt_vigen();
    
    #obtener tip prod
    call obt_tipProd();
    
    #obt cc vigen
    call obt_ccVig();

/* PROCEDURE */

	#validar usuario
	DELIMITER $$
	create procedure vali_usu($usu varchar(10),$clav varchar(25))
    COMMENT 'validar usuario'
    BEGIN
		
        select * from user where user_alias=$usu and user_pass=$clav;
    
    end;

	#obtener vigencias
    DELIMITER $$
    create procedure obt_vigen()
    COMMENT 'obtener vigencias'
    BEGIN
    
		select 
        *,
        (select tip_prod_des from tip_prod where tip_prod_id=vig.tip_prod_id) as tip_prod,
        datediff(now(),vig.vigen_fechVigen) as dif_fech,
        (select if(dif_fech<0,'por vencer','vencido')) as esta_vigen
        from vigen as vig;
    
    end;

	#obtener tip prod
    DELIMITER $$
    create procedure obt_tipProd()
    COMMENT 'obtener tip prod'
    BEGIN
    
		SELECT * FROM tip_prod;
    
    end;

	#obt año venc
    DELIMITER $$
    create procedure obt_anVen()
    COMMENT 'obt min y max año'
    BEGIN
    
		select distinct YEAR(vigen_fechVigen) as anVen
               from
               vigen order by YEAR(vigen_fechVigen);
    
    end;

	#obt cc vigen
    DELIMITER $$
    create procedure obt_ccVig()
    COMMENT 'obt cc vigen'
    BEGIN
    
		select distinct vigen_cc as cc_vigen from vigen;
    
    end;

/* FUNCTION */  

	#insert vigen
    DELIMITER $$
    create function insert_vigen($tip int(11),
								$cc char(15),
                                $proy varchar(200),
								$des varchar(25),
                                $seri varchar(50),
                                $mar varchar(200),
                                $cli varchar(500),
                                $fac varchar(25),
                                $fechIni date,
                                $fechVig date)
    RETURNS int(11)
    COMMENT 'insert vigen'
    BEGIN
    
		 declare $rowAfect int(11);
    
		 insert into vigen(tip_prod_id,
						   vigen_cc,
                           vigen_proy,
                           vigen_des,
                           vigen_seri,
                           vigen_mar,
                           vigen_cli,
                           vigen_fac,
                           vigen_fechIni,
                           vigen_fechVigen) 
                           values 
                           ($tip,
							$cc,
                            $proy,
							$des,
							$seri,
							$mar,
							$cli,
							$fac,
							$fechIni,
							$fechVig);	
         
         set $rowAfect=(select ROW_COUNT());
         
         return $rowAfect;
		
    
    END;
    

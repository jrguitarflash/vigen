/* user */
    
    #validar usuario -> OK
	DELIMITER $$
	create procedure vali_usu($usu varchar(10),$clav varchar(25))
    COMMENT 'validar usuario'
    BEGIN
		
        select * from user where user_alias=$usu and user_pass=$clav;
    
    end;

/* vigen */
    
    #obtener vigencias -> OK
    DELIMITER $$
    create procedure obt_vigen($est int(11),$anu int(11),$tip int(11),$cc varchar(25))
    COMMENT 'obtener vigencias'
    BEGIN
    
		declare $est_fil varchar(50) default '';
		declare $est_op varchar(10) default '';

		declare $anu_fil varchar(50) default '';
		declare $anu_op varchar(10) default '';

		declare $tip_fil varchar(50) default '';
		declare $tip_op varchar(10) default '';

		declare $cc_fil varchar(50) default '';
		declare $cc_op varchar(10) default '';

		if ($est>0) then

				case $est
			
				when 1 then set $est_fil=" and (datediff(now(),vig.vigen_fechVigen))>=0";
				when 2 then set $est_fil=" and (datediff(now(),vig.vigen_fechVigen))<0";
                
                end case;

		elseif($anu>0) then

				set $anu_fil=concat(" and YEAR(vig.vigen_fechVigen)=",$anu);

		elseif($tip>0) then

				set $tip_fil=concat(" and vig.tip_prod_id=",$tip);

		elseif($cc!="") then

				set $cc_fil=concat(" and vig.vigen_cc='",$cc,"'");

		end if;


		set @sql=concat("select 
						*,
						(select tip_prod_des from tip_prod where tip_prod_id=vig.tip_prod_id) as tip_prod,
						datediff(now(),vig.vigen_fechVigen) as dif_fech,
						(select if(dif_fech<0,'por vencer','vencido')) as esta_vigen
						from vigen as vig where vig.vigen_id>0",
						$est_fil,
						$anu_fil,
						$tip_fil,
						$cc_fil);

		#select @sql;
		prepare smtm from @sql;
		execute smtm;
    
    end;
    
	#obt año venc -> OK
    DELIMITER $$
    create procedure obt_anVen()
    COMMENT 'obt min y max año'
    BEGIN
    
		select distinct YEAR(vigen_fechVigen) as anVen
               from
               vigen order by YEAR(vigen_fechVigen);
    
    end;
    
	#obt cc vigen ->OK
    DELIMITER $$
    create procedure obt_ccVig()
    COMMENT 'obt cc vigen'
    BEGIN
    
		select distinct 
			vigen_cc as vigen_cc_id,
            vigen_cc as vigen_cc_des 
            from vigen;
    
    end;

	#insert vigen -> OK
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
                                $fechVig date,
                                $contac varchar(200),
                                $mail varchar(200))
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
                           vigen_fechVigen,
                           vigen_contac,
                           vigen_mail) 
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
							$fechVig,
                            $contac,
                            $mail);	
         
         set $rowAfect=(select ROW_COUNT());
         
         return $rowAfect;
         
	 END; 

/* tip_vigen
    todos
    vencidos
    por vencer
  */
  
	#obt tip vigen
    DELIMITER $$
    create procedure obt_tipVig()
    COMMENT 'obt tip vigen'
    begin
    
		select * from tip_vigen;
    
    END; 
  
/* tip_prod
		todos
		suministros
		accesorios
		servicios
*/
  
	#obtener tip prod -> OK
    DELIMITER $$
    create procedure obt_tipProd()
    COMMENT 'obtener tip prod'
    BEGIN
    
		SELECT * FROM tip_prod;
    
    end;
  
/* vigen alert */

	#obt ult aler -> OK
    DELIMITER $$
    create procedure obt_ultAler()
    COMMENT 'obt ult aler'
    begin
    
		select * from vigen_alert order by vigen_alert_id desc limit 0,1;
    
    end;
    
	#config alert -> OK
     DELIMITER $$
     create function config_alert($frecu int(11),$est int(11),$tip int(11),$anu int(11),$id int(11))
     RETURNS int(11)
     COMMENT 'config alert'
     begin
     
		declare $rowAfect int(11);
     
		if($id=0) then
		
			insert into vigen_alert(vigen_frecu_id,
									vigen_est_id,
									vigen_tip_id,
									vigen_anu)
									values($frecu,
											$est,
											$tip,
											$anu);
											
        
        elseif ($id>0) then
        
			update vigen_alert set vigen_frecu_id=$frecu,
									vigen_est_id=$est,
                                    vigen_tip_id=$tip,
                                    vigen_anu=$anu
                                    where
                                    vigen_alert_id=$id;
			
        
        end if;
        
		set $rowAfect=(select row_count());
                                        
        return $rowAfect;                                
     
     end;

/* vigen desti */

	 #ope desti ->
     DELIMITER $$
	 create function ope_desti($nom varchar(50),$mail varchar(200),$op varchar(10),$id int(11))
     RETURNS int(11)
     COMMENT 'ope desti'
     begin
     
		declare $rowAfect int(11);
     
		if($op="agre") then
        
			insert into vigen_desti(vigen_desti_nom,vigen_desti_email) values ($nom,$mail);
        
        elseif($op="del") then
        
			delete from vigen_desti where vigen_desti_id=$id;
        
        end if;
        
        set $rowAfect=(select row_count());
        
        return $rowAfect;
     
     end;
     

	 #obte desti
     DELIMITER $$
     create procedure obte_desti()
     COMMENT 'obte desti'
     begin
     
		select
			desti.vigen_desti_id as id,
            desti.vigen_desti_nom as nom,
            desti.vigen_desti_email as mail
            from
            vigen_desti as desti;
     
     end;


/* vigen frecu */
    
	#obt vigen frecu ->OK
    DELIMITER $$
    create procedure obt_frecu()
    COMMENT 'obt vigen frecu'
    BEGIN
    
		select * from vigen_frecu;
    
    end;
	

/* vigen hist */

	#insert vigen hist
    DELIMITER $$
    create function insert_hist($vigen_id int(11),$hist_envi int(11),$hist_fech date,$hist_msg text)
    RETURNS int(11)
    COMMENT 'insert vigen hist'
    BEGIN
    
		declare $rowAfect int(11) default 0;
    
		insert into vigen_hist(vigen_id,
								vigen_hist_envi,
                                vigen_hist_fechEnv,
                                vigen_hist_msg) values 
                                ($vigen_id,
                                $hist_envi,
                                Now(),
                                $hist_msg);
		
        set $rowAfect=(select row_count());
        
        return $rowAfect;
    
    end;


/* vigen rep */

	#insert vigen rep
    DELIMITER $$
    create function insert_rep($alert_id int(11),
								$rep_nom varchar(200),
								$rep_fech date,
                                $rep_msg varchar(200),
                                $rep_env int(11))
    RETURNS int(11)
    COMMENT 'insert vigen rep'
    begin
    
		declare $id int(11) default 0;
    
		insert into vigen_rep(vigen_alert_id,
								vigen_rep_nom,
                                vigen_rep_fech,
                                vigen_rep_msg,
                                vigen_rep_env) values
                                ($alert_id,
								 $rep_nom,
								 Now(),
								 $rep_msg,
								 $rep_env);
                                 
        set $id=(SELECT LAST_INSERT_ID());
        
        return $id;
    
    end;
    
    
    



	   
         

     
     

    

    

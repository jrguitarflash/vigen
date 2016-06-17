-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 192.168.1.190
-- Tiempo de generación: 11-05-2016 a las 23:51:35
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `oct27eld_vigencia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obte_desti`()
    COMMENT 'obte desti'
begin
     
		select
			desti.vigen_desti_id as id,
            desti.vigen_desti_nom as nom,
            desti.vigen_desti_email as mail
            from
            vigen_desti as desti;
     
     end$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obt_anVen`()
    COMMENT 'obt min y max año'
BEGIN
    
		select distinct YEAR(vigen_fechVigen) as anVen
               from
               vigen order by YEAR(vigen_fechVigen);
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obt_ccVig`()
    COMMENT 'obt cc vigen'
BEGIN
    
		select distinct vigen_cc as vigen_cc_id,vigen_cc as vigen_cc_des from vigen;
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obt_frecu`()
    COMMENT 'obt vigen frecu'
BEGIN
    
		select * from vigen_frecu;
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obt_tipProd`()
    COMMENT 'obtener tip prod'
BEGIN
    
		SELECT * FROM tip_prod;
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obt_tipVig`()
    COMMENT 'obt tip vigen'
select * from tip_vigen$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obt_ultAler`()
    COMMENT 'obt ult aler'
begin
    
		select * from vigen_alert order by vigen_alert_id desc limit 0,1;
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `obt_vigen`($est int(11),$anu int(11),$tip int(11),$cc varchar(25))
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
        
        
        if($est>0) then
        
			case $est
            
				when 1 then set $est_fil=" and (datediff(now(),vig.vigen_fechVigen))>=0";
                when 2 then set $est_fil=" and (datediff(now(),vig.vigen_fechVigen))<0";
                
            end case;    
        
        end if;
        
        if($anu>0) then
        
				set $anu_fil=concat(" and YEAR(vig.vigen_fechVigen)='",$anu,"'");
        
        end if;
        
        if($tip>0) then
        
				set $tip_fil=concat(" and vig.tip_prod_id=",$tip);
        
        end if;
        
        if($cc!="") then
        
				set $cc_fil=concat(" and vig.vigen_cc='",$cc,"'");
        
        end if;        
                
        
        set @sql=concat("select 
        *,
        (select tip_prod_des from tip_prod where tip_prod_id=vig.tip_prod_id) as tip_prod,
        datediff(now(),vig.vigen_fechVigen) as dif_fech,
        (select if(dif_fech<0,'<span style=color:red >por vencer</span>','<span style=color:green >vencido</span>')) as esta_vigen,
        (select if(dif_fech<0,'por vencer','vencido')) as esta_vigen_des
        from vigen as vig where vig.vigen_id>0",
        $est_fil,
        $anu_fil,
        $tip_fil,
        $cc_fil);
        
        #select @sql;
        prepare smtm from @sql;
        execute smtm;
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` PROCEDURE `vali_usu`($usu varchar(10),$clav varchar(25))
    COMMENT 'validar usuario'
BEGIN
		
        select * from user where user_alias=$usu and user_pass=$clav;
    
    end$$

--
-- Funciones
--
CREATE DEFINER=`oct27eld`@`localhost` FUNCTION `config_alert`($frecu int(11),$est int(11),$tip int(11),$anu int(11),$id int(11)) RETURNS int(11)
    COMMENT 'config alert'
begin
     
		declare $rowAfect int(11);
     
		if $id=0 then
		
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
     
     end$$

CREATE DEFINER=`oct27eld`@`localhost` FUNCTION `insert_hist`($vigen_id int(11),$hist_envi int(11),$hist_fech date,$hist_msg text) RETURNS int(11)
    COMMENT 'insert vigen hist'
BEGIN
    
		declare $rowAfect int(11) default 0;
    
		insert into vigen_hist(vigen_id,
								vigen_hist_envi,
                                vigen_hist_fechEnv,
                                vigen_hist_msg) values 
                                ($vigen_id,
                                $hist_envi,
                                $hist_fech,
                                $hist_msg);
		
        set $rowAfect=(select row_count());
        
        return $rowAfect;
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` FUNCTION `insert_rep`($alert_id int(11),
								$rep_nom varchar(200),
								$rep_fech date,
                                $rep_msg varchar(200),
                                $rep_env int(11)) RETURNS int(11)
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
    
    end$$

CREATE DEFINER=`oct27eld`@`localhost` FUNCTION `insert_vigen`($tip int(11),
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
                                $mail varchar(200)) RETURNS int(11)
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
		
    
    END$$

CREATE DEFINER=`oct27eld`@`localhost` FUNCTION `ope_desti`($nom varchar(50),$mail varchar(200),$op varchar(10),$id int(11)) RETURNS int(11)
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
     
     end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_prod`
--

CREATE TABLE IF NOT EXISTS `tip_prod` (
  `tip_prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_prod_des` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`tip_prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tip_prod`
--

INSERT INTO `tip_prod` (`tip_prod_id`, `tip_prod_des`) VALUES
(1, 'accesorios'),
(2, 'suministros'),
(3, 'servicios'),
(4, 'otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_vigen`
--

CREATE TABLE IF NOT EXISTS `tip_vigen` (
  `tip_vigen_id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_vigen_des` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tip_vigen_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tip_vigen`
--

INSERT INTO `tip_vigen` (`tip_vigen_id`, `tip_vigen_des`) VALUES
(1, 'vencido'),
(2, 'por vencer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_alias` varchar(10) DEFAULT NULL,
  `user_pass` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_alias`, `user_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vigen`
--

CREATE TABLE IF NOT EXISTS `vigen` (
  `vigen_id` int(11) NOT NULL AUTO_INCREMENT,
  `tip_prod_id` int(11) DEFAULT NULL,
  `tip_vigen_id` int(11) DEFAULT NULL,
  `vigen_cc` char(15) DEFAULT NULL,
  `vigen_proy` varchar(200) DEFAULT NULL,
  `vigen_des` varchar(25) DEFAULT NULL,
  `vigen_seri` varchar(50) DEFAULT NULL,
  `vigen_mar` varchar(200) DEFAULT NULL,
  `vigen_cli` varchar(500) DEFAULT NULL,
  `vigen_fac` varchar(25) DEFAULT NULL,
  `vigen_fechIni` date DEFAULT NULL,
  `vigen_fechVigen` date DEFAULT NULL,
  `vigen_contac` varchar(200) DEFAULT NULL,
  `vigen_mail` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`vigen_id`),
  KEY `tip_prod_id_fk` (`tip_prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `vigen`
--

INSERT INTO `vigen` (`vigen_id`, `tip_prod_id`, `tip_vigen_id`, `vigen_cc`, `vigen_proy`, `vigen_des`, `vigen_seri`, `vigen_mar`, `vigen_cli`, `vigen_fac`, `vigen_fechIni`, `vigen_fechVigen`, `vigen_contac`, `vigen_mail`) VALUES
(1, 2, NULL, 'cc-1100', 'suministro y servicio', 'abc', '323', 'entec', 'luz del sur', '343434', '2016-04-13', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(2, 2, NULL, 'cc-1101', 'suministro y servicio', 'abc', '324', 'entec', 'luz del sur', '343435', '2016-04-14', '2016-04-14', 'Jose', 'jrguitarflash@gmail.com'),
(3, 2, NULL, 'cc-1102', 'suministro y servicio', 'abc', '325', 'entec', 'luz del sur', '343436', '2016-04-15', '2016-04-15', 'Jose', 'jrguitarflash@gmail.com'),
(4, 2, NULL, 'cc-1103', 'suministro y servicio', 'abc', '326', 'entec', 'luz del sur', '343437', '2016-04-16', '2016-04-16', 'Jose', 'jrguitarflash@gmail.com'),
(5, 2, NULL, 'cc-1104', 'suministro y servicio', 'abc', '327', 'entec', 'luz del sur', '343438', '2016-04-17', '2016-04-17', 'Jose', 'jrguitarflash@gmail.com'),
(6, 2, NULL, 'cc-1105', 'suministro y servicio', 'abc', '328', 'entec', 'luz del sur', '343439', '2016-04-18', '2016-04-18', 'Jose', 'jrguitarflash@gmail.com'),
(7, 2, NULL, 'cc-1106', 'suministro y servicio', 'abc', '329', 'entec', 'luz del sur', '343440', '2016-04-19', '2016-04-19', 'Jose', 'jrguitarflash@gmail.com'),
(8, 2, NULL, 'cc-1107', 'suministro y servicio', 'abc', '330', 'entec', 'luz del sur', '343441', '2016-04-20', '2016-04-20', 'Jose', 'jrguitarflash@gmail.com'),
(9, 2, NULL, 'cc-1108', 'suministro y servicio', 'abc', '331', 'entec', 'luz del sur', '343442', '2016-04-21', '2016-04-21', 'Jose', 'jrguitarflash@gmail.com'),
(10, 2, NULL, 'cc-1109', 'suministro y servicio', 'abc', '332', 'entec', 'luz del sur', '343443', '2016-04-22', '2016-04-22', 'Jose', 'jrguitarflash@gmail.com'),
(11, 2, NULL, 'cc-1110', 'suministro y servicio', 'abc', '333', 'entec', 'luz del sur', '343444', '2016-04-23', '2016-04-23', 'Jose', 'jrguitarflash@gmail.com'),
(12, 2, NULL, 'cc-1111', 'suministro y servicio', 'abc', '334', 'entec', 'luz del sur', '343445', '2016-04-24', '2016-04-24', 'Jose', 'jrguitarflash@gmail.com'),
(13, 2, NULL, 'cc-1112', 'suministro y servicio', 'abc', '335', 'entec', 'luz del sur', '343446', '2016-04-25', '2016-04-25', 'Jose', 'jrguitarflash@gmail.com'),
(14, 2, NULL, 'cc-1113', 'suministro y servicio', 'abc', '336', 'entec', 'luz del sur', '343447', '2016-04-26', '2016-04-26', 'Jose', 'jrguitarflash@gmail.com'),
(15, 2, NULL, 'cc-1114', 'suministro y servicio', 'abc', '337', 'entec', 'luz del sur', '343448', '2016-04-27', '2016-04-27', 'Jose', 'jrguitarflash@gmail.com'),
(16, 2, NULL, 'cc-1115', 'suministro y servicio', 'abc', '338', 'entec', 'luz del sur', '343449', '2016-04-28', '2016-04-28', 'Jose', 'jrguitarflash@gmail.com'),
(17, 2, NULL, 'cc-1116', 'suministro y servicio', 'abc', '339', 'entec', 'luz del sur', '343450', '2016-04-29', '2019-04-29', 'Jose', 'jrguitarflash@gmail.com'),
(18, 2, NULL, 'cc-1117', 'suministro y servicio', 'abc', '340', 'entec', 'luz del sur', '343451', '2016-04-30', '2016-04-30', 'Jose', 'jrguitarflash@gmail.com'),
(19, 2, NULL, 'cc-1118', 'suministro y servicio', 'abc', '341', 'entec', 'luz del sur', '343452', '2016-05-01', '2016-05-01', 'Jose', 'jrguitarflash@gmail.com'),
(20, 2, NULL, 'cc-1119', 'suministro y servicio', 'abc', '342', 'entec', 'luz del sur', '343453', '2016-05-02', '2017-01-09', 'Jose', 'jrguitarflash@gmail.com'),
(21, 2, NULL, 'cc-1100', 'suministro y servicio', 'abc', '323', 'entec', 'luz del sur', '343434', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(22, 2, NULL, 'cc-1101', 'suministro y servicio', 'abc', '324', 'entec', 'luz del sur', '343435', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(23, 2, NULL, 'cc-1102', 'suministro y servicio', 'abc', '325', 'entec', 'luz del sur', '343436', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(24, 2, NULL, 'cc-1103', 'suministro y servicio', 'abc', '326', 'entec', 'luz del sur', '343437', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(25, 2, NULL, 'cc-1104', 'suministro y servicio', 'abc', '327', 'entec', 'luz del sur', '343438', '0000-00-00', '2016-04-14', 'Jose', 'jrguitarflash@gmail.com'),
(26, 2, NULL, 'cc-1105', 'suministro y servicio', 'abc', '328', 'entec', 'luz del sur', '343439', '0000-00-00', '2016-04-15', 'Jose', 'jrguitarflash@gmail.com'),
(27, 2, NULL, 'cc-1106', 'suministro y servicio', 'abc', '329', 'entec', 'luz del sur', '343440', '0000-00-00', '2016-04-16', 'Jose', 'jrguitarflash@gmail.com'),
(28, 2, NULL, 'cc-1100', 'suministro y servicio', 'abc', '323', 'entec', 'luz del sur', '343434', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(29, 2, NULL, 'cc-1101', 'suministro y servicio', 'abc', '324', 'entec', 'luz del sur', '343435', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(30, 2, NULL, 'cc-1102', 'suministro y servicio', 'abc', '325', 'entec', 'luz del sur', '343436', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(31, 2, NULL, 'cc-1103', 'suministro y servicio', 'abc', '326', 'entec', 'luz del sur', '343437', '0000-00-00', '2016-04-13', 'Jose', 'jrguitarflash@gmail.com'),
(32, 2, NULL, 'cc-1104', 'suministro y servicio', 'abc', '327', 'entec', 'luz del sur', '343438', '0000-00-00', '2016-04-14', 'Jose', 'jrguitarflash@gmail.com'),
(33, 2, NULL, 'cc-1105', 'suministro y servicio', 'abc', '328', 'entec', 'luz del sur', '343439', '0000-00-00', '2016-04-15', 'Jose', 'jrguitarflash@gmail.com'),
(34, 2, NULL, 'cc-1106', 'suministro y servicio', 'abc', '329', 'entec', 'luz del sur', '343440', '0000-00-00', '2016-05-11', 'Jose', 'jrguitarflash@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vigen_alert`
--

CREATE TABLE IF NOT EXISTS `vigen_alert` (
  `vigen_alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `vigen_frecu_id` int(11) DEFAULT NULL,
  `vigen_est_id` int(11) DEFAULT NULL,
  `vigen_tip_id` int(11) DEFAULT NULL,
  `vigen_anu` int(11) DEFAULT NULL,
  PRIMARY KEY (`vigen_alert_id`),
  KEY `vigen_frecu_id_fk` (`vigen_frecu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `vigen_alert`
--

INSERT INTO `vigen_alert` (`vigen_alert_id`, `vigen_frecu_id`, `vigen_est_id`, `vigen_tip_id`, `vigen_anu`) VALUES
(1, 1, 1, 1, 2016),
(2, 1, 0, 0, 2016),
(3, 1, 0, 0, 0),
(4, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vigen_desti`
--

CREATE TABLE IF NOT EXISTS `vigen_desti` (
  `vigen_desti_id` int(11) NOT NULL AUTO_INCREMENT,
  `vigen_desti_nom` varchar(50) DEFAULT NULL,
  `vigen_desti_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`vigen_desti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `vigen_desti`
--

INSERT INTO `vigen_desti` (`vigen_desti_id`, `vigen_desti_nom`, `vigen_desti_email`) VALUES
(4, 'Raul', 'jrguitarflash@gmail.com'),
(6, 'Jose', 'jose.fernandez@electrowerke.com.pe'),
(7, 'Carlos', 'carlos.castillo@electrowerke.com.pe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vigen_frecu`
--

CREATE TABLE IF NOT EXISTS `vigen_frecu` (
  `vigen_frecu_id` int(11) NOT NULL AUTO_INCREMENT,
  `vigen_frecu_des` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`vigen_frecu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `vigen_frecu`
--

INSERT INTO `vigen_frecu` (`vigen_frecu_id`, `vigen_frecu_des`) VALUES
(1, 'Semanal'),
(2, 'Quincenal'),
(3, 'Mensual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vigen_hist`
--

CREATE TABLE IF NOT EXISTS `vigen_hist` (
  `vigen_hist_id` int(11) NOT NULL AUTO_INCREMENT,
  `vigen_id` int(11) DEFAULT NULL,
  `vigen_hist_envi` int(11) DEFAULT NULL,
  `vigen_hist_fechEnv` date DEFAULT NULL,
  `vigen_hist_msg` text,
  PRIMARY KEY (`vigen_hist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `vigen_hist`
--

INSERT INTO `vigen_hist` (`vigen_hist_id`, `vigen_id`, `vigen_hist_envi`, `vigen_hist_fechEnv`, `vigen_hist_msg`) VALUES
(1, 0, 1, '2016-05-10', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-10 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(2, 34, 1, '2016-05-10', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-10 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(3, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(4, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(5, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(6, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(7, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(8, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(9, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(10, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke'),
(11, 0, 1, '2016-05-11', 'Sr. Jose el equipo con referencia de N? factura 343440 y numero de serie 329 del proyecto suministro y servicio ha vencido el dia de hoy ya que tiene como fecha de vigencia 2016-05-11 le enviamos este correo para confirmarle la vigencia.<br><br>Atte. Electrowerke');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vigen_rep`
--

CREATE TABLE IF NOT EXISTS `vigen_rep` (
  `vigen_rep_id` int(11) NOT NULL AUTO_INCREMENT,
  `vigen_alert_id` int(11) DEFAULT NULL,
  `vigen_rep_nom` varchar(200) DEFAULT NULL,
  `vigen_rep_fech` date DEFAULT NULL,
  `vigen_rep_msg` varchar(200) DEFAULT NULL,
  `vigen_rep_env` int(11) DEFAULT NULL,
  PRIMARY KEY (`vigen_rep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `vigen_rep`
--

INSERT INTO `vigen_rep` (`vigen_rep_id`, `vigen_alert_id`, `vigen_rep_nom`, `vigen_rep_fech`, `vigen_rep_msg`, `vigen_rep_env`) VALUES
(1, 4, '', '2016-05-10', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1),
(2, 4, '', '2016-05-11', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1),
(3, 4, '', '2016-05-11', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1),
(4, 4, '', '2016-05-11', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1),
(5, 4, '', '2016-05-11', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1),
(6, 4, '', '2016-05-11', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1),
(7, 4, '', '2016-05-11', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1),
(8, 4, '', '2016-05-11', 'Buenos dias, se ha generado el reporte de vigencias segun la configuracion realizada en el modulo.<br><br>Atte. Electrowerke', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vigen`
--
ALTER TABLE `vigen`
  ADD CONSTRAINT `tip_prod_id_fk` FOREIGN KEY (`tip_prod_id`) REFERENCES `tip_prod` (`tip_prod_id`);

--
-- Filtros para la tabla `vigen_alert`
--
ALTER TABLE `vigen_alert`
  ADD CONSTRAINT `vigen_frecu_id_fk` FOREIGN KEY (`vigen_frecu_id`) REFERENCES `vigen_frecu` (`vigen_frecu_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

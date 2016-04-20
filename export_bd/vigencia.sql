-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 192.168.1.190
-- Tiempo de generación: 21-04-2016 a las 01:23:06
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vigencia`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`%` PROCEDURE `obt_vigen`()
    COMMENT 'obtener vigencias'
BEGIN
    
		select 
        *,
        (select tip_prod_des from tip_prod where tip_prod_id=vig.tip_prod_id) as tip_prod,
        datediff(now(),vig.vigen_fechVigen) as dif_fech,
        (select if(dif_fech<0,"<span style='color:red' >por vencer</span>","<span style='color:green' >vencido</span>")) as esta_vigen
        from vigen as vig;
    
    end$$

CREATE DEFINER=`root`@`%` PROCEDURE `vali_usu`($usu varchar(10),$clav varchar(25))
    COMMENT 'validar usuario'
BEGIN
		
        select * from user where user_alias=$usu and user_pass=$clav;
    
    end$$

--
-- Funciones
--
CREATE DEFINER=`root`@`%` FUNCTION `insert_vigen`($tip int(11),
								$cc char(15),
                                $proy varchar(200),
								$des varchar(25),
                                $seri varchar(50),
                                $mar varchar(200),
                                $cli varchar(500),
                                $fac varchar(25),
                                $fechIni date,
                                $fechVig date) RETURNS int(11)
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
		
    
    END$$

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
(4, 'ninguno');

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
  `vigen_cc` char(15) DEFAULT NULL,
  `vigen_proy` varchar(200) DEFAULT NULL,
  `vigen_des` varchar(25) DEFAULT NULL,
  `vigen_seri` varchar(50) DEFAULT NULL,
  `vigen_mar` varchar(200) DEFAULT NULL,
  `vigen_cli` varchar(500) DEFAULT NULL,
  `vigen_fac` varchar(25) DEFAULT NULL,
  `vigen_fechIni` date DEFAULT NULL,
  `vigen_fechVigen` date DEFAULT NULL,
  PRIMARY KEY (`vigen_id`),
  KEY `tip_prod_id_fk` (`tip_prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `vigen`
--

INSERT INTO `vigen` (`vigen_id`, `tip_prod_id`, `vigen_cc`, `vigen_proy`, `vigen_des`, `vigen_seri`, `vigen_mar`, `vigen_cli`, `vigen_fac`, `vigen_fechIni`, `vigen_fechVigen`) VALUES
(1, 2, 'cc-1100', 'suministro y servicio', 'abc', '323', 'entec', 'luz del sur', '343434', '2016-04-13', '2016-04-13'),
(2, 2, 'cc-1101', 'suministro y servicio', 'abc', '324', 'entec', 'luz del sur', '343435', '2016-04-14', '2016-04-14'),
(3, 2, 'cc-1102', 'suministro y servicio', 'abc', '325', 'entec', 'luz del sur', '343436', '2016-04-15', '2016-04-15'),
(4, 2, 'cc-1103', 'suministro y servicio', 'abc', '326', 'entec', 'luz del sur', '343437', '2016-04-16', '2016-04-16'),
(5, 2, 'cc-1104', 'suministro y servicio', 'abc', '327', 'entec', 'luz del sur', '343438', '2016-04-17', '2016-04-17'),
(6, 2, 'cc-1105', 'suministro y servicio', 'abc', '328', 'entec', 'luz del sur', '343439', '2016-04-18', '2016-04-18'),
(7, 2, 'cc-1106', 'suministro y servicio', 'abc', '329', 'entec', 'luz del sur', '343440', '2016-04-19', '2016-04-19'),
(8, 2, 'cc-1107', 'suministro y servicio', 'abc', '330', 'entec', 'luz del sur', '343441', '2016-04-20', '2016-04-20'),
(9, 2, 'cc-1108', 'suministro y servicio', 'abc', '331', 'entec', 'luz del sur', '343442', '2016-04-21', '2016-04-21'),
(10, 2, 'cc-1109', 'suministro y servicio', 'abc', '332', 'entec', 'luz del sur', '343443', '2016-04-22', '2016-04-22'),
(11, 2, 'cc-1110', 'suministro y servicio', 'abc', '333', 'entec', 'luz del sur', '343444', '2016-04-23', '2016-04-23'),
(12, 2, 'cc-1111', 'suministro y servicio', 'abc', '334', 'entec', 'luz del sur', '343445', '2016-04-24', '2016-04-24'),
(13, 2, 'cc-1112', 'suministro y servicio', 'abc', '335', 'entec', 'luz del sur', '343446', '2016-04-25', '2016-04-25'),
(14, 2, 'cc-1113', 'suministro y servicio', 'abc', '336', 'entec', 'luz del sur', '343447', '2016-04-26', '2016-04-26'),
(15, 2, 'cc-1114', 'suministro y servicio', 'abc', '337', 'entec', 'luz del sur', '343448', '2016-04-27', '2016-04-27'),
(16, 2, 'cc-1115', 'suministro y servicio', 'abc', '338', 'entec', 'luz del sur', '343449', '2016-04-28', '2016-04-28'),
(17, 2, 'cc-1116', 'suministro y servicio', 'abc', '339', 'entec', 'luz del sur', '343450', '2016-04-29', '2016-04-29'),
(18, 2, 'cc-1117', 'suministro y servicio', 'abc', '340', 'entec', 'luz del sur', '343451', '2016-04-30', '2016-04-30'),
(19, 2, 'cc-1118', 'suministro y servicio', 'abc', '341', 'entec', 'luz del sur', '343452', '2016-05-01', '2016-05-01'),
(20, 2, 'cc-1119', 'suministro y servicio', 'abc', '342', 'entec', 'luz del sur', '343453', '2016-05-02', '2016-05-02');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vigen`
--
ALTER TABLE `vigen`
  ADD CONSTRAINT `tip_prod_id_fk` FOREIGN KEY (`tip_prod_id`) REFERENCES `tip_prod` (`tip_prod_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
